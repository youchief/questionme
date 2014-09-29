<div class="login">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Connexion'); ?></legend>
	<?php
		echo $this->Form->input('username', array('class'=>'form-control'));
		echo $this->Form->input('password', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
