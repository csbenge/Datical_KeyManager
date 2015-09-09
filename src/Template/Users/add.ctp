<!-- File: src/Template/Users/add.ctp -->

<div class="container-fluid">
  <?php if ($authUserRole == "Admin") { ?>

    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
        <li><?= $this->Html->link(__('Cancel'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete: {0}?', $user->email)]) ?></li>
      </ul>
    </div>

    <div class="col-md-8 main">
      <br/>
         <div class="users form centered well" style="width:750px">
            <div style="text-align:left;"><h3><i class="fa fa-fw fa-user"></i>Add User</h3></div>
            <br/>
            <?= $this->Form->create($user) ?>

        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role', array(
                    'options' => array('Admin' => 'Admin', 'Manager' => 'Manager', 'User' => 'User')
                    ));
        ?>

    <br/>
    <?= $this->Form->button(__('Add User'), ['class' => 'btn btn-small btn-success']); ?>
    <?= $this->Form->end() ?>
        </div>
    </div>
    <?php } else { ?>
      <div class="col-md-10 main">
        <div class="alert alert-danger">Access Denied!</div>
      </div>
    <?php } ?>
</div>
