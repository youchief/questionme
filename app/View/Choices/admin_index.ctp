<div class="choices index">
        <h2><?php echo __('Choices'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class'=>'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('response'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('type'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('media'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('media_type'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('question_id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('choice_type_id'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($choices as $choice): ?>
	<tr>
		<td><?php echo h($choice['Choice']['id']); ?>&nbsp;</td>
		<td><?php echo h($choice['Choice']['response']); ?>&nbsp;</td>
		<td><?php echo h($choice['Choice']['type']); ?>&nbsp;</td>
		<td><?php echo h($choice['Choice']['media']); ?>&nbsp;</td>
		<td><?php echo h($choice['Choice']['media_type']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($choice['Question']['question'], array('controller' => 'questions', 'action' => 'view', $choice['Question']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($choice['ChoiceType']['name'], array('controller' => 'choice_types', 'action' => 'view', $choice['ChoiceType']['id'])); ?>
		</td>
		<td class="actions">
		<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $choice['Choice']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $choice['Choice']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $choice['Choice']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $choice['Choice']['id'])); ?>
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
