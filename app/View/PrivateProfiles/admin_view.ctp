<div class="privateProfiles view">
        <h2><?php echo __('Private Profile'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($privateProfile['PrivateProfile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($privateProfile['PrivateProfile']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($privateProfile['PrivateProfile']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile'); ?></dt>
		<dd>
			<?php echo $this->Html->link($privateProfile['Profile']['id'], array('controller' => 'profiles', 'action' => 'view', $privateProfile['Profile']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($privateProfile['User']['username'], array('controller' => 'users', 'action' => 'view', $privateProfile['User']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Private Profile'), array('action' => 'edit', $privateProfile['PrivateProfile']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Private Profile'), array('action' => 'delete', $privateProfile['PrivateProfile']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $privateProfile['PrivateProfile']['id'])); ?> 
        </div>
</div>
