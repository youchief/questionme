<div class="profiles form">
<?php echo $this->Form->create('Profile'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Profile'); ?></legend>
	<?php
		echo $this->Form->input('key', array('class'=>'form-control'));
		echo $this->Form->input('value', array('class'=>'form-control'));
		echo $this->Form->input('user_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
