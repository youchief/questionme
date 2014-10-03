<div class="choiceTypes view">
        <h2><?php echo __('Choice Type'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($choiceType['ChoiceType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($choiceType['ChoiceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($choiceType['ChoiceType']['description']); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Choice Type'), array('action' => 'edit', $choiceType['ChoiceType']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Choice Type'), array('action' => 'delete', $choiceType['ChoiceType']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $choiceType['ChoiceType']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Choices'); ?></h3>
                <?php if (!empty($choiceType['Choice'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Media'); ?></th>
		<th><?php echo __('Media Type'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Choice Type Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($choiceType['Choice'] as $choice): ?>
		<tr>
			<td><?php echo $choice['id']; ?></td>
			<td><?php echo $choice['response']; ?></td>
			<td><?php echo $choice['type']; ?></td>
			<td><?php echo $choice['media']; ?></td>
			<td><?php echo $choice['media_type']; ?></td>
			<td><?php echo $choice['question_id']; ?></td>
			<td><?php echo $choice['choice_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'choices', 'action' => 'view', $choice['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'choices', 'action' => 'edit', $choice['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'choices', 'action' => 'delete', $choice['id']), null, __('Are you sure you want to delete # %s?', $choice['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
