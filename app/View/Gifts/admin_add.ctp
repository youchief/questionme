<div class="gifts form">
<?php echo $this->Form->create('Gift'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Gift'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class'=>'form-control'));
		echo $this->Form->input('used', array('class'=>'form-control'));
		echo $this->Form->input('customer_id', array('class'=>'form-control'));
		echo $this->Form->input('winner_id', array('class'=>'form-control'));
		echo $this->Form->input('qday_id', array('class'=>'form-control'));
		echo $this->Form->input('User', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
