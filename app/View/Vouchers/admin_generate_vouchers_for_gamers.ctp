<div class="vouchers form">
<?php echo $this->Form->create('Voucher', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Generate Voucher For Gamers'); ?></legend>
	<?php
                echo $this->Form->input('from', array('class'=>'form-control', 'type'=>'date', 'dateFormat'=>'DMY'));
                echo $this->Form->input('to', array('class'=>'form-control', 'type'=>'date', 'dateFormat'=>'DMY'));
		echo $this->Form->input('voucher_id', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
