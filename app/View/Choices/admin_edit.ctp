<div class="choices form">
<?php echo $this->Form->create('Choice', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Choice'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('response', array('class'=>'form-control'));
                echo $this->Form->input('is_right', array('class'=>'checkbox'));
		echo $this->Form->input('type', array('class'=>'form-control'));
		echo $this->Form->input('media', array('class'=>'form-control', 'type'=>'file'));
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
