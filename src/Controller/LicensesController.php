<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\I18n\Time;

/**
 * Licenses Controller
 *
 * @property \App\Model\Table\LicensesTable $Licenses
 */
class LicensesController extends AppController
{

  /**
   * Dashboard method
   *
   * @return void
   */
    public function dashboard()
    {
      // Get Total license count
       $databases = TableRegistry::get('Licenses');
       $query = $databases->find();
       $totalLicenseCount = $query->count();
       $this->set('totalLicenseCount', $totalLicenseCount);

       // Get Total license count
       $now = Time::now();
       $currentEvaluationCount = 0;
       foreach ($query as $row) {
           $expire = Time::createFromFormat(
               'Y-m-d',
               $row->notAfter
           );
          $now = Time::now();
          $daysLeft = $expire->diff($now);
          $daysRemaining = $daysLeft->format('%a');
          if ($daysRemaining > 0) {
            $currentEvaluationCount = $currentEvaluationCount + 1;
          }
       }
       $this->set('currentEvaluationCount', $currentEvaluationCount);

       // Get inactive evaluation count
       $expiredLicenseCount = $totalLicenseCount - $currentEvaluationCount;
       $this->set('expiredLicenseCount', $expiredLicenseCount);
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('licenses', $this->paginate($this->Licenses));
        $this->set('_serialize', ['licenses']);
    }

    /**
     * View method
     *
     * @param string|null $id License id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $license = $this->Licenses->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('license', $license);
        $this->set('_serialize', ['license']);
    }

    /**
     * Download method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function download($id = null)
    {
      $license = $this->Licenses->get($id);
      Time::setToStringFormat('YYYY-MM-dd');

      // Point to .lic file
      $companyName = str_replace(' ', '_', $license->companyName);
      $now = Time::now();
      $date = sprintf("%04d-%02d-%02d", $now->year, $now->month, $now->day);
      $companyName = $companyName . "_" . $date;
      $licFileName = TMP . "/licenses/" . $companyName  . ".lic";
      $this->response->file($licFileName, array('download' => true));
      return $this->response;
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

      $licenseJSON = '{
      	  "consumerAmount":XconsumerAmountX,
      	  "consumerType":"XconsumerTypeX",
      	  "issuer":"CN=XissuerX",
      	  "subject":"Datical DB XconsumerTypeX",
      	  "holder":"CN=XcompanyNameX,O=XcompanyStageX",
      	  "notAfter":"XnotAfterXT23:59:59-0500",
      	  "info":"Datical DB XcompanyStageX License"
      	}';

        $license = $this->Licenses->newEntity();

        if ($this->request->is('post')) {
            $license = $this->Licenses->patchEntity($license, $this->request->data);
            // Build the JSON license
            $licenseJSON = str_replace("XconsumerAmountX", "1", $licenseJSON);
            $licenseJSON = str_replace("XconsumerTypeX", $license->consumerType, $licenseJSON);
            $licenseJSON = str_replace("XissuerX", $license->companyName, $licenseJSON);
            $licenseJSON = str_replace("XcompanyStageX", $license->info, $licenseJSON);
            $licenseJSON = str_replace("XcompanyNameX", $license->companyName, $licenseJSON);
            $licenseJSON = str_replace("XnotAfterX", $license->notAfter, $licenseJSON);
            // Write out the .json file
            $companyName = str_replace(' ', '_', $license->companyName);
            $now = Time::now();
            $date = sprintf("%04d-%02d-%02d", $now->year, $now->month, $now->day);
            $companyName = $companyName . "_" . $date;
            $jsonFileName = TMP . "/licenses/" . $companyName . ".json";
            $licFileName = TMP . "/licenses/" . $companyName  . ".lic";
            $jsonFile = fopen($jsonFileName, "w");
            fwrite($jsonFile, $licenseJSON);
            fclose($jsonFile);
            // Generate the license .lic file
            $keygenJar = APP . "/Shell/" . "keygen.jar";
            $cmd       = "java -jar " . $keygenJar . " create " . $licFileName . " " . $jsonFileName;
            $handle = popen($cmd, 'r');
            pclose($handle);
            // Read in generated lic file and stuff in database
            $licFileName = TMP . "/licenses/" . $companyName  . ".lic";
            $licFile = fopen($jsonFileName, "rb");
            $data = fread($licFile, filesize($licFileName));
            fclose($licFile);
            $license->binLicense = $data;

            $license->jsonLicense = $licenseJSON;
            if ($this->Licenses->save($license)) {
                $this->Flash->success(__('The license has been saved.'));
                return $this->redirect(array('action' => 'view', $license->id));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The license could not be saved. Please, try again.'));
            }
        }
        $users = $this->Licenses->Users->find('list', ['limit' => 200]);
        $this->set(compact('license', 'users'));
        $this->set('_serialize', ['license']);
    }

    /**
     * Edit method
     *
     * @param string|null $id License id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $license = $this->Licenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $license = $this->Licenses->patchEntity($license, $this->request->data);
            if ($this->Licenses->save($license)) {
                $this->Flash->success(__('The license has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The license could not be saved. Please, try again.'));
            }
        }
        $users = $this->Licenses->Users->find('list', ['limit' => 200]);
        $this->set(compact('license', 'users'));
        $this->set('_serialize', ['license']);
    }

    /**
     * Delete method
     *
     * @param string|null $id License id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $license = $this->Licenses->get($id);
        if ($this->Licenses->delete($license)) {
            $this->Flash->success(__('The license has been deleted.'));
        } else {
            $this->Flash->error(__('The license could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
