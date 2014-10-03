<div class="questionTypes view">
        <h2><?php echo __('Question Type'); ?></h2>
        <dl>
                		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionType['QuestionType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($questionType['QuestionType']['name']); ?>
			&nbsp;
		</dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                		<?php echo $this->Html->link(__('Edit Question Type'), array('action' => 'edit', $questionType['QuestionType']['id']), array('class'=>'btn btn-sm btn-default')); ?>
		<?php echo $this->Form->postLink(__('Delete Question Type'), array('action' => 'delete', $questionType['QuestionType']['id']), array('class'=>'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $questionType['QuestionType']['id'])); ?> 
        </div>
</div>
        <div class="related">
                <h3><?php echo __('Related Questions'); ?></h3>
                <?php if (!empty($questionType['Question'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Media'); ?></th>
		<th><?php echo __('Media Type'); ?></th>
		<th><?php echo __('Dependance Choice Id'); ?></th>
		<th><?php echo __('Priority'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Question Type Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        	<?php
		$i = 0;
		foreach ($questionType['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['question']; ?></td>
			<td><?php echo $question['date']; ?></td>
			<td><?php echo $question['media']; ?></td>
			<td><?php echo $question['media_type']; ?></td>
			<td><?php echo $question['dependance_choice_id']; ?></td>
			<td><?php echo $question['priority']; ?></td>
			<td><?php echo $question['active']; ?></td>
			<td><?php echo $question['question_type_id']; ?></td>
			<td><?php echo $question['order_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), null, __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </table>
                <?php endif; ?>

        </div>
