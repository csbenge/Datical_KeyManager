<?php

/* src/View/Helper/LinkHelper.php (using other helpers) */

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class LicensesViewHelper extends Helper
{
  public $helpers = ['Html'];

  public function getDaysLeftHTML($expiresDate)
  {

      $expire = Time::createFromFormat(
          'Y-m-d',
          $expiresDate
      );
     $now = Time::now();
     $daysLeft = $expire->diff($now);
     //return($daysLeft->format('%a'));
     //return( (strtotime($expire) - strtotime($now)) / (60*60));
     $daysRemaining = $daysLeft->format('%a');


       $class = '<span class="label label-default"><b>';
       if ($daysRemaining <=0) {
           $class = '<span class="label label-danger">';
       } elseif ($daysRemaining <=7) {
           $class = '<span class="label label-warning">';
       } elseif ($daysRemaining <=14) {
           $class = '<span class="label label-info">';
       } elseif ($daysRemaining <=14) {
           $class = '<span class="label label-success">';
       }
       return $class . $daysRemaining . '</b></span>';
   }

}
