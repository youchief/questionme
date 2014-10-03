<div class="questionTypes index">
        <h2><?php echo __('Question Types'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class'=>'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                                                <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($questionTypes as $questionType): ?>
	<tr>
		<td><?php echo h($questionType['QuestionType']['id']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['name']); ?>&nbsp;</td>
		<td class="actions">
		<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionType['QuestionType']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionType['QuestionType']['id']), array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionType['QuestionType']['id']), array('class'=>'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $questionType['QuestionType']['id'])); ?>
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
