<!-- File: src/Template/Users/view.ctp -->

<div class="container-fluid">
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
        <?php if ($authUserRole == "Admin") { ?>
          <li><?= $this->Form->postLink(__('Delete License'), ['action' => 'delete', $license->id], ['confirm' => __('Are you sure you want to delete # {0}?', $license->id)]) ?> </li>
        <?php } ?>
        <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?> </li>
        <?= $this->Html->link(__('Download License'), ['action' => 'download', $license->id], ['class' => 'btn btn-small btn-success']) ?>
      </ul>
    </div>

    <div class="col-md-8 main">
    <h2 class="page-header"><i class="fa fa-fw fa-key"></i>Company <small><?= h($license->companyName) ?></small></h2>

        <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <td><strong><?= __('Company Name') ?>:</strong></td>
            <td><?= h($license->companyName) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Contact Name') ?>:</strong></td>
            <td><?= h($license->contactName) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Email Address') ?></strong></td>
            <td><?= h($license->contactEmail) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Expires') ?></strong></td>
            <td><?= h($license->notAfter) ?></td>
        </tr>

        <tr>
            <td><strong><?= __('ConsumerType') ?></strong></td>
            <td><?= h($license->consumerType) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('ConsumerAmount') ?></strong></td>
            <td><?= h($license->consumerAmount) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Issuer') ?></strong></td>
            <td><?= h($license->issuer) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Subject') ?></strong></td>
            <td><?= h($license->subject) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Holder') ?></strong></td>
            <td><?= h($license->holder) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Info') ?></strong></td>
            <td><?= h($license->info) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Added') ?></strong></td>
            <td><?= h($license->created) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Updated') ?></strong></td>
            <td><?= h($license->modified) ?></td>
        </tr>

        <tr>
            <td><strong><?= __('JsonLicense') ?></td>
            <td><?= $this->Text->autoParagraph(h($license->jsonLicense)) ?></td>
        </tr>

        </table>
    </div>
</div>
