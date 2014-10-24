<div class="qdays view">
        <h2><?php echo __('Qday'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qday['Qday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($qday['Qday']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($qday['Qday']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nb Qmobile'); ?></dt>
		<dd>
			<?php echo h($qday['Qday']['nb_qmobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nb Qfixe'); ?></dt>
		<dd>
			<?php echo h($qday['Qday']['nb_qfixe']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Nb Qprofile'); ?></dt>
		<dd>
			<?php echo h($qday['Qday']['nb_qprofile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($qday['Region']['name'], array('controller' => 'regions', 'action' => 'view', $qday['Region']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Qday'), array('action' => 'edit', $qday['Qday']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Qday'), array('action' => 'delete', $qday['Qday']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $qday['Qday']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Gifts'); ?></h3>
                <?php if (!empty($qday['Gift'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Used'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Winner Id'); ?></th>
		<th><?php echo __('Qday Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($qday['Gift'] as $gift): ?>
		<tr>
			<td><?php echo $gift['id']; ?></td>
			<td><?php echo $gift['created']; ?></td>
			<td><?php echo $gift['name']; ?></td>
			<td><?php echo $gift['used']; ?></td>
			<td><?php echo $gift['customer_id']; ?></td>
			<td><?php echo $gift['winner_id']; ?></td>
			<td><?php echo $gift['qday_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $gift['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $gift['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), null, __('Are you sure you want to delete # %s?', $gift['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
