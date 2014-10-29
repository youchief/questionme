<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('active', array('class'=>'checkbox'));
		echo $this->Form->input('repondants', array('class'=>'form-control'));
		echo $this->Form->input('nb_questions', array('class'=>'form-control'));
		echo $this->Form->input('customer_id', array('class'=>'form-control'));
		echo $this->Form->input('order_type_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
