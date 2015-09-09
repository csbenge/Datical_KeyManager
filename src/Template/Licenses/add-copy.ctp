<!-- File: src/Template/Licenses/add.ctp -->

<br/>
<div class="container-fluid">
    <div class="col-md-2 sidebar">
      <ul class="nav nav-sidebar">
      <h3><?= __('Actions') ?></h3>
       <?php if (($authUserRole == "Admin") || ($authUserRole == "Manager")) { ?>
            <li><?= $this->Html->link(__('Cancel'), ['action' => 'index']) ?></li>
        <?php } ?>
      </ul>
    </div>

    <div class="col-md-8 main">
         <div class="users form centered well" style="width:750px">
            <div style="text-align:left;"><h3><i class="fa fa-fw fa-key"></i>Create License</h3></div>
            <br/>
            <?= $this->Form->create($license) ?>
            <fieldset>
              
                <?php
                    echo $this->Form->input('consumerAmount');
                    echo $this->Form->input('consumerType');
                    echo $this->Form->input('issuer');
                    echo $this->Form->input('subject');
                    echo $this->Form->input('holder');
                    echo $this->Form->input('notAfter');
                    echo $this->Form->input('info');
                    echo $this->Form->input('companyName');
                    echo $this->Form->input('contactName');
                    echo $this->Form->input('contactEmail');
                    echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->input('jsonLicense');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
