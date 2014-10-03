<div class="orderTypes view">
        <h2><?php echo __('Order Type'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderType['OrderType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orderType['OrderType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($orderType['OrderType']['description']); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Order Type'), array('action' => 'edit', $orderType['OrderType']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Order Type'), array('action' => 'delete', $orderType['OrderType']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $orderType['OrderType']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Orders'); ?></h3>
                <?php if (!empty($orderType['Order'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Repondants'); ?></th>
		<th><?php echo __('Nb Questions'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Order Type Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($orderType['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['active']; ?></td>
			<td><?php echo $order['repondants']; ?></td>
			<td><?php echo $order['nb_questions']; ?></td>
			<td><?php echo $order['customer_id']; ?></td>
			<td><?php echo $order['order_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
