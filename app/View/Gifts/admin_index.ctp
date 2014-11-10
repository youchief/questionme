<div class="gifts index">
        <h2><?php echo __('Gifts'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class'=>'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('used'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('customer_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('winner_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('qday_id'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($gifts as $gift): ?>
	<tr>
		<td><?php echo h($gift['Gift']['id']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['created']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['name']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['used']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gift['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $gift['Customer']['id'])); ?>
		</td>
		<td><?php echo h($gift['Gift']['winner_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gift['Qday']['start'], array('controller' => 'qdays', 'action' => 'view', $gift['Qday']['id'])); ?>
		</td>
		<td class="actions">
		<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gift['Gift']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gift['Gift']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?>
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
