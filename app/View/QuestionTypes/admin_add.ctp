<div class="questionTypes form">
<?php echo $this->Form->create('QuestionType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Question Type'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
