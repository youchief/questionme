<div class="gifts form">
<?php echo $this->Form->create('Gift', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Gift'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class'=>'form-control'));
                echo $this->Form->input('description', array('class'=>'form-control'));
                echo $this->Form->input('validity', array('class'=>'form-control'));
                echo $this->Form->input('conditions', array('class'=>'form-control'));
		echo $this->Form->input('media', array('class'=>'form-control', 'type'=>'file'));
		echo $this->Form->input('customer_id', array('class'=>'form-control'));
		echo $this->Form->input('qday_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
