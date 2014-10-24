<div class="queries form">
<?php echo $this->Form->create('Query'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Query'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('key', array('class'=>'form-control'));
		echo $this->Form->input('value', array('class'=>'form-control'));
		echo $this->Form->input('sign', array('class'=>'form-control'));
		echo $this->Form->input('question_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
