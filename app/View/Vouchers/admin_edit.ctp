<div class="vouchers form">
<?php echo $this->Form->create('Voucher', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Voucher'); ?></legend>
	<?php
                echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('date', array('class'=>'form-control'));
                echo $this->Form->input('image', array('class'=>'form-control', 'type'=>'file'));
		echo $this->Form->input('name', array('class'=>'form-control'));
		echo $this->Form->input('description', array('class'=>'form-control'));
		echo $this->Form->input('validity', array('class'=>'form-control'));
		echo $this->Form->input('conditions', array('class'=>'form-control'));
		echo $this->Form->input('customer_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
