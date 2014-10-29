<div class="qweeks view">
        <h2><?php echo __('Qweek'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qweek['Qweek']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($qweek['Qweek']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($qweek['Qweek']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($qweek['Region']['name'], array('controller' => 'regions', 'action' => 'view', $qweek['Region']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Qweek'), array('action' => 'edit', $qweek['Qweek']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Qweek'), array('action' => 'delete', $qweek['Qweek']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $qweek['Qweek']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Big Gifts'); ?></h3>
                <?php if (!empty($qweek['BigGift'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Media'); ?></th>
		<th><?php echo __('Winner Id'); ?></th>
		<th><?php echo __('Qweek Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($qweek['BigGift'] as $bigGift): ?>
		<tr>
			<td><?php echo $bigGift['id']; ?></td>
			<td><?php echo $bigGift['created']; ?></td>
			<td><?php echo $bigGift['name']; ?></td>
			<td><?php echo $bigGift['description']; ?></td>
			<td><?php echo $bigGift['media']; ?></td>
			<td><?php echo $bigGift['winner_id']; ?></td>
			<td><?php echo $bigGift['qweek_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'big_gifts', 'action' => 'view', $bigGift['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'big_gifts', 'action' => 'edit', $bigGift['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'big_gifts', 'action' => 'delete', $bigGift['id']), null, __('Are you sure you want to delete # %s?', $bigGift['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
