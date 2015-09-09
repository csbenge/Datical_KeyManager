<!-- File: src/Template/Users/login.ctp -->

<br/>
<div class="row">
<div class="col-md-3"></div>
     <div class="col-md-8">
		<div class="users form centered well" style="width:500px">
		    <div style="text-align:center;"><h3>Datical License Manager<br/><?php echo __('Login'); ?></h3></div>
		    <br/>
			<?= $this->Form->create() ?>
			<big>
		        <?= $this->Form->input('email') ?>
		        <?= $this->Form->input('password') ?>
			<br/>
			<?= $this->Form->button(__('Login'), ['class' => 'btn btn-small btn-success']); ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
