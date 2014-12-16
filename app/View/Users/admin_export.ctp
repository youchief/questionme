<div class="banners form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Export Result'); ?></legend>
	<?php
		echo $this->Form->input('start', array('type'=>'date','class' => 'form-control', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
                echo $this->Form->input('end', array('type'=>'date', 'class' => 'form-control', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
