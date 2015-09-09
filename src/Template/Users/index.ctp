<!-- File: src/Template/Users/index.ctp -->

<div class="container-fluid">
<?php if ($authUserRole == "Admin") { ?>
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
        <?php if (($authUserRole == "Admin") || ($authUserRole == "Manager")) { ?>
            <li><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></li>
        <?php } ?>
      </ul>
      </ul>
    </div>

    <div class="col-md-8 main">
    <h2 class="page-header"><i class="fa fa-fw fa-user"></i>Users <small>All</small></h2>



    <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th nowrap><?= $this->Paginator->sort('firstname', 'First Name') ?></th>
            <th nowrap><?= $this->Paginator->sort('lastname', 'Last Name') ?></th>
            <th nowrap><?= $this->Paginator->sort('email', 'Email Address') ?></th>
            <th><?= $this->Paginator->sort('role') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->firstname) ?></td>
            <td><?= h($user->lastname) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->role) ?></td>
            <td><?= h($user->created) ?></td>
            <td nowrap class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                <?php if ($authUserRole == "Admin") { ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete: {0}?', $user->email)]) ?>
                <?php } ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

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
  <?php } else { ?>
    <div class="col-md-10 main">
      <div class="alert alert-danger">Access Denied!</div>
    </div>
  <?php } ?>
</div>
