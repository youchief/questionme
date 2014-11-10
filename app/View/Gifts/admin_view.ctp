<div class="gifts view">
        <h2><?php echo __('Gift'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Used'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gift['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $gift['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner Id'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['winner_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qday'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gift['Qday']['start'], array('controller' => 'qdays', 'action' => 'view', $gift['Qday']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Gift'), array('action' => 'edit', $gift['Gift']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Gift'), array('action' => 'delete', $gift['Gift']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Users'); ?></h3>
                <?php if (!empty($gift['User'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Newsletter'); ?></th>
		<th><?php echo __('Facebook Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($gift['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['sex']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['newsletter']; ?></td>
			<td><?php echo $user['facebook_id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['region_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
