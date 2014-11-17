<div class="orders view">
        <h2><?php echo h($order['Order']['name']); ?></h2>
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($order['Order']['id']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Created'); ?></dt>
                <dd>
                        <?php echo h($order['Order']['created']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Active'); ?></dt>
                <dd>
                        <?php echo h($order['Order']['active']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Deadline'); ?></dt>
                <dd>
                        <?php echo h($order['Order']['deadline']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Repondants'); ?></dt>
                <dd>
                        <?php echo h($order['Order']['repondants']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Nb Questions'); ?></dt>
                <dd>
                        <?php echo h($order['Order']['nb_questions']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Customer'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($order['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $order['Customer']['id'])); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Order Type'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($order['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $order['OrderType']['id'])); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> 
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related Questions'); ?></h3>
        <?php if (!empty($order['Question'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
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
                        foreach ($order['Question'] as $question):
                                ?>
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
