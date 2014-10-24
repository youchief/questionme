<div class="vouchers view">
        <h2><?php echo __('Voucher'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($voucher['Voucher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($voucher['Voucher']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($voucher['Voucher']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($voucher['Voucher']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validity'); ?></dt>
		<dd>
			<?php echo h($voucher['Voucher']['validity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conditions'); ?></dt>
		<dd>
			<?php echo h($voucher['Voucher']['conditions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($voucher['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $voucher['Customer']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Voucher'), array('action' => 'edit', $voucher['Voucher']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Voucher'), array('action' => 'delete', $voucher['Voucher']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $voucher['Voucher']['id'])); ?> 
        </div>
</div>
