<div class="customerTypes form">
<?php echo $this->Form->create('BannerType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Banner Type'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class'=>'form-control'));
		echo $this->Form->input('description', array('class'=>'form-control'));
                echo $this->Form->input('order', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
