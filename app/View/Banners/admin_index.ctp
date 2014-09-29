<div class="banners index">
        <h2><?php echo __('Banners'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class'=>'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('start'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('end'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('background'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('subtitle'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('region_id'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($banners as $banner): ?>
	<tr>
		<td><?php echo h($banner['Banner']['id']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['start']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['end']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['background']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['title']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['subtitle']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($banner['Region']['name'], array('controller' => 'regions', 'action' => 'view', $banner['Region']['id'])); ?>
		</td>
		<td class="actions">
		<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $banner['Banner']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?>
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
