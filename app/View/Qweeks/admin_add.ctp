<div class="qweeks form">
<?php echo $this->Form->create('Qweek'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Qweek'); ?></legend>
	<?php
		echo $this->Form->input('start', array('class'=>'form-control', 'dateFormat'=>'DMY'));
		echo $this->Form->input('end', array('class'=>'form-control', 'dateFormat'=>'DMY'));
		echo $this->Form->input('region_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
