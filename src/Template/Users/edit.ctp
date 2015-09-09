<!-- File: src/Template/Users/edit.ctp -->

<div class="container-fluid">
    <?php if ($authUserRole == "Admin") { ?>
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
       <?php if (($authUserRole == "Admin") || ($authUserRole == "Manager")) { ?>
            <li><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <?php } ?>
        <?php if ($authUserRole == "Admin") { ?>
            <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete: {0}?', $user->email)]) ?></li>
        <?php } ?>
      </ul>
    </div>

    <div class="col-md-6 main">
    <br/>
    <div class="users form centered well" style="width:750px">
    <h3 class="page-header"><i class="fa fa-fw fa-user"></i>Edit User <small><?= h($user->email) ?></small></h3>

    <?= $this->Form->create($user) ?>
        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role', array(
                    'options' => array('User' => 'User', 'Manager' => 'Manager', 'Admin' => 'Admin')
                    ));
        ?>
    <br/>
    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-small btn-success']); ?>
    <?= $this->Form->end() ?>
</div>
</div>
<?php } else { ?>
  <div class="col-md-10 main">
    <div class="alert alert-danger">Access Denied!</div>
  </div>
<?php } ?>
</div>
