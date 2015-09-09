<!-- File: src/Template/Users/view.ctp -->

<div class="container-fluid">
    <?php if ($authUserRole == "Admin") { ?>
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
       <?php if (($authUserRole == "Admin") || ($authUserRole == "Manager")) { ?>
            <li><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?></li>
            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <?php } ?>
        <?php if ($authUserRole == "Admin") { ?>
            <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete: {0}?', $user->email)]) ?></li>
        <?php } ?>
      </ul>
    </div>

    <div class="col-md-8 main">
    <h2 class="page-header"><i class="fa fa-fw fa-user"></i>User <small><?= h($user->email) ?></small></h2>
        <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <td><strong><?= __('First Name') ?>:</strong></td>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Last Name') ?>:</strong></td>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Email Address') ?>:</strong></td>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Role') ?>:</strong></td>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Added') ?>:</strong></td>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <td><strong><?= __('Updated') ?>:</strong></td>
            <td><?= h($user->modified) ?></td>
        </tr>
        </table>
    </div>

    <?php } else { ?>
      <div class="col-md-10 main">
        <div class="alert alert-danger">Access Denied!</div>
      </div>
    <?php } ?>
</div>
