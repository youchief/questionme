<div class="choices view">
        <h2><?php echo __('Choice'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($choice['Choice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response'); ?></dt>
		<dd>
			<?php echo h($choice['Choice']['response']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Media'); ?></dt>
		<dd>
                        <?php if (!empty($choice['Choice']['media'])):?>
                                <?php echo $this->Html->image($choice['Choice']['media'])?>
                        <?php endif; ?>
                        			&nbsp;
		</dd>
		<dt><?php echo __('Media Type'); ?></dt>
		<dd>
			<?php echo h($choice['Choice']['media_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($choice['Question']['question'], array('controller' => 'questions', 'action' => 'view', $choice['Question']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Choice'), array('action' => 'edit', $choice['Choice']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Choice'), array('action' => 'delete', $choice['Choice']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $choice['Choice']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Users'); ?></h3>
                <?php if (!empty($choice['User'])): ?>
                <table cellpadding = "0" cellspacing = "0" class='table'>
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($choice['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['email']; ?></td>
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
