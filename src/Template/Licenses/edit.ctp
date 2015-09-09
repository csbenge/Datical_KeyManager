<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $license->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $license->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Licenses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="licenses form large-10 medium-9 columns">
    <?= $this->Form->create($license) ?>
    <fieldset>
        <legend><?= __('Edit License') ?></legend>
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
