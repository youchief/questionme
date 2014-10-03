<div class="choices form">
<?php echo $this->Form->create('Choice'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Choice'); ?></legend>
	<?php
		echo $this->Form->input('response', array('class'=>'form-control'));
		echo $this->Form->input('type', array('class'=>'form-control'));
		echo $this->Form->input('media', array('class'=>'form-control'));
		echo $this->Form->input('media_type', array('class'=>'form-control'));
		echo $this->Form->input('question_id', array('class'=>'form-control'));
		echo $this->Form->input('choice_type_id', array('class'=>'form-control'));
		echo $this->Form->input('User', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
