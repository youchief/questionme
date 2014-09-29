<div class="customers form">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class'=>'form-control'));
		echo $this->Form->input('code', array('class'=>'form-control'));
		echo $this->Form->input('address', array('class'=>'form-control'));
		echo $this->Form->input('zip', array('class'=>'form-control'));
		echo $this->Form->input('city', array('class'=>'form-control'));
		echo $this->Form->input('country', array('class'=>'form-control'));
		echo $this->Form->input('phone', array('class'=>'form-control'));
		echo $this->Form->input('email', array('class'=>'form-control'));
		echo $this->Form->input('description', array('class'=>'form-control'));
		echo $this->Form->input('customer_type_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
