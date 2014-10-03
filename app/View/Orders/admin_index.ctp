<div class="orders index">
        <h2><?php echo __('Orders'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class'=>'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('active'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('repondants'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('nb_questions'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('customer_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('order_type_id'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['active']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['repondants']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['nb_questions']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $order['Customer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $order['OrderType']['id'])); ?>
		</td>
		<td class="actions">
		<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
		</div>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <div class="well well-sm">
                <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
        </div>
        <ul class="pagination">
                <?php echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>' ?>
                <?php echo '<li>'.$this->Paginator->numbers(array('separator' => '')).'</li>' ?>
                <?php echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>' ?>
        </ul>
</div>
