<?php echo $this->element('editor')?>

<div class="gifts form">
<?php echo $this->Form->create('Gift', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Gift'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class'=>'form-control'));
		echo $this->Form->input('name', array('class'=>'form-control'));
                echo $this->Form->input('description', array('class'=>'form-control'));
                echo $this->Form->input('validity', array('class'=>'form-control'));
                echo $this->Form->input('conditions', array('class'=>'form-control'));
                echo $this->Form->input('media', array('class' => 'form-control', 'type' => 'file', 'after'=>$this->Html->image($this->request->data['Gift']['media'], array('width'=>'200px', 'class'=>'img-rounded'))));
		echo $this->Form->input('customer_id', array('class'=>'form-control'));
		echo $this->Form->input('winner_id', array('class'=>'form-control'));
		echo $this->Form->input('qday_id', array('class'=>'form-control'));
		echo $this->Form->input('User', array('class'=>'form-control'));
	?>
	</fieldset>
        <hr>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>
</div>
