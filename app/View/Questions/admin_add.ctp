<div class="questions form">
<?php echo $this->Form->create('Question', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Question'); ?></legend>
	<?php
		echo $this->Form->input('question', array('class'=>'form-control'));
		echo $this->Form->input('date', array('class'=>'form-control'));
		echo $this->Form->input('media', array('class'=>'form-control', 'type'=>'file'));
		echo $this->Form->input('media_type', array('class'=>'form-control'));
		echo $this->Form->input('dependance_choice_id', array('class'=>'form-control'));
		echo $this->Form->input('priority', array('class'=>'form-control'));
		echo $this->Form->input('active', array('class'=>'form-control'));
		echo $this->Form->input('question_type_id', array('class'=>'form-control'));
		echo $this->Form->input('order_id', array('class'=>'form-control'));
		echo $this->Form->input('Region', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
