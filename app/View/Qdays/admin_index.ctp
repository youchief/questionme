<div class="qdays index">
        <h2><?php echo __('Qdays'); ?> <?php echo $this->Html->link(\__('+'), array('action' => 'add'), array('class' => 'btn btn-success btn-sm')); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('start'); ?></th>
                        <th><?php echo $this->Paginator->sort('end'); ?></th>
                        <th><?php echo $this->Paginator->sort('nb_qmobile'); ?></th>
                        <th><?php echo $this->Paginator->sort('nb_qfixe'); ?></th>
                        <th><?php echo $this->Paginator->sort('region_id'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php foreach ($qdays as $qday): ?>
                        <tr>
                                <td><?php echo h($qday['Qday']['id']); ?>&nbsp;</td>
                                <td><?php echo $this->Time->format('d-m-Y H:i',$qday['Qday']['start']); ?>&nbsp;</td>
                                <td><?php echo $this->Time->format('d-m-Y H:i',$qday['Qday']['end']); ?>&nbsp;</td>
                                <td><?php echo h($qday['Qday']['nb_qmobile']); ?>&nbsp;</td>
                                <td><?php echo h($qday['Qday']['nb_qfixe']); ?>&nbsp;</td>
                                <td>
                                        <?php echo $this->Html->link($qday['Region']['name'], array('controller' => 'regions', 'action' => 'view', $qday['Region']['id'])); ?>
                                </td>
                                <td class="actions">
                                        <div class="btn-group">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $qday['Qday']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $qday['Qday']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $qday['Qday']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $qday['Qday']['id'])); ?>
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
