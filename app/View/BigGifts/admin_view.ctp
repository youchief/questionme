<div class="bigGifts view">
        <h2><?php echo __('Big Gift'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bigGift['BigGift']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bigGift['BigGift']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bigGift['BigGift']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($bigGift['BigGift']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo h($bigGift['BigGift']['media']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner Id'); ?></dt>
		<dd>
			<?php echo h($bigGift['BigGift']['winner_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qweek'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bigGift['Qweek']['id'], array('controller' => 'qweeks', 'action' => 'view', $bigGift['Qweek']['id'])); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Big Gift'), array('action' => 'edit', $bigGift['BigGift']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Big Gift'), array('action' => 'delete', $bigGift['BigGift']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $bigGift['BigGift']['id'])); ?> 
        </div>
</div>
