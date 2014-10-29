<div class="bigGifts form">
<?php echo $this->Form->create('BigGift', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Big Gift'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('name', array('class'=>'form-control'));
		echo $this->Form->input('description', array('class'=>'form-control'));
		echo $this->Form->input('media', array('class'=>'form-control', 'type'=>'file'));
		echo $this->Form->input('winner_id', array('class'=>'form-control'));
		echo $this->Form->input('qweek_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
