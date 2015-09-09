<!-- File: src/Template/Users/index.ctp -->

<div class="container-fluid">
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
        <?php if (($authUserRole == "Admin") || ($authUserRole == "Manager")) { ?>
            <li><?= $this->Html->link(__('Create License'), ['action' => 'add']) ?></li>
        <?php } ?>
      </ul>
      </ul>
    </div>

    <div class="col-md-8 main">
    <h2 class="page-header"><i class="fa fa-fw fa-key"></i>Licenses <small>All</small></h2>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Company Name') ?></th>
            <th style="text-align:center"><?= $this->Paginator->sort('Days Left') ?></th>
            <th><?= $this->Paginator->sort('Expires') ?></th>
            <th><?= $this->Paginator->sort('Contact Name') ?></th>
            <th><?= $this->Paginator->sort('Contact Email') ?></th>
            <th><?= $this->Paginator->sort('Duration') ?></th>
            <th><?= $this->Paginator->sort('Role') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($licenses as $license): ?>
        <tr>
            <td><?= $this->Html->link(h($license->companyName), ['action' => 'view', $license->id]) ?></td>
            <td style="text-align:center"><?= $this->LicensesView->getDaysLeftHTML(h($license->notAfter)) ?></td>
            <td><?= h($license->notAfter) ?></td>
            <td><?= h($license->contactName) ?></td>
            <td><?= h($license->contactEmail) ?></td>
            <td><?= h($license->info) ?></td>
            <td><?= h($license->consumerType) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
  </div>

    <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-7 text-center">
       <ul class="pagination">
           <?= $this->Paginator->prev('< ' . __('previous')) ?>
           <?= $this->Paginator->numbers() ?>
           <?= $this->Paginator->next(__('next') . ' >') ?><br/>
           <small><?= $this->Paginator->counter() ?></small>
       </ul>
     </div>
     <div class="col-md-3"></div>
   </div>

</div>
