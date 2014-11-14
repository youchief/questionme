<div class="questions index">
        <h2><?php echo __('Questions'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class' => 'btn btn-success btn-sm')); ?></h2>
        <?php echo $this->Form->create('Question') ?>
        <?php echo $this->Form->input('search', array('class' => 'form-control', 'label' => false, 'placeholder' => 'search...')); ?>
        <?php echo $this->Form->end(); ?>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('question'); ?></th>
                        <th><?php echo $this->Paginator->sort('profile'); ?></th>
                        <th><?php echo $this->Paginator->sort('date'); ?></th>
                        <th><?php echo $this->Paginator->sort('active'); ?></th>
                        <th><?php echo $this->Paginator->sort('question_type_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('order_id'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($questions as $question): ?>
                        <tr>
                                <td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
                                <td><?php echo h($question['Question']['question']); ?>&nbsp;</td>
                                <td><?php echo h($question['Question']['profile']); ?>&nbsp;</td>
                                <td><?php echo $this->Time->format('d/m/y', $question['Question']['date']); ?>&nbsp;</td>
                                <td><?php echo h($question['Question']['active']); ?>&nbsp;</td>
                                <td>
                                        <?php echo $this->Html->link($question['QuestionType']['name'], array('controller' => 'question_types', 'action' => 'view', $question['QuestionType']['id'])); ?>
                                </td>
                                <td>
                                        <?php echo $this->Html->link($question['Order']['name'], array('controller' => 'orders', 'action' => 'view', $question['Order']['id'])); ?>
                                </td>
                                <td class="actions">
                                        <div class="btn-group">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $question['Question']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
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
                <?php echo '<li>' . $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')) . '</li>' ?>
                <?php echo '<li>' . $this->Paginator->numbers(array('separator' => '')) . '</li>' ?>
                <?php echo '<li>' . $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')) . '</li>' ?>
        </ul>
</div>
