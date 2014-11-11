<div class="questions view">
        <h2><?php echo h($question['Question']['question']); ?>  <?php echo $this->Html->link('Summary', array('controller'=>'questions', 'action'=>'summary', $question['Question']['id']), array('class'=>'btn btn-success'))?></h2>      
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['id']); ?>
                        &nbsp;
                </dd>
               <dt><?php echo __('Profile'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['profile']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Date'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['date']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Media'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['media']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Media Type'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['media_type']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Dependance Choice Id'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['dependance_choice_id']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Priority'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['priority']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Active'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['active']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Final Order Question'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['final_order_question']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Question Type'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($question['QuestionType']['name'], array('controller' => 'question_types', 'action' => 'view', $question['QuestionType']['id'])); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Order'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($question['Order']['name'], array('controller' => 'orders', 'action' => 'view', $question['Order']['id'])); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('To Age Start'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['to_age_start']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('To Age End'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['to_age_end']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('To Gender'); ?></dt>
                <dd>
                        <?php echo h($question['Question']['to_gender']); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Preview'), array('action' => 'preview', $question['Question']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> 
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related Choices'); ?></h3>
        <?php if (!empty($question['Choice'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Response'); ?></th>
                                <th><?php echo __('Media'); ?></th>
                                <th><?php echo __('Media Type'); ?></th>
                                <th><?php echo __('Question Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($question['Choice'] as $choice):
                                ?>
                                <tr>
                                        <td><?php echo $choice['id']; ?></td>
                                        <td><?php echo $choice['response']; ?></td>
                                        <td><?php echo $choice['media']; ?></td>
                                        <td><?php echo $choice['media_type']; ?></td>
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
<div class="related">
        <h3><?php echo __('Related Queries'); ?></h3>
        <?php if (!empty($question['Query'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Key'); ?></th>
                                <th><?php echo __('Sign'); ?></th>

                                <th><?php echo __('Value'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($question['Query'] as $query):
                                ?>
                                <tr>
                                        <td><?php echo $query['id']; ?></td>
                                        <td><?php echo $query['key']; ?></td>
                                        <td><?php echo $query['sign']; ?></td>
                                        <td><?php echo $query['value']; ?></td>

                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'queries', 'action' => 'view', $query['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'queries', 'action' => 'edit', $query['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'queries', 'action' => 'delete', $query['id']), null, __('Are you sure you want to delete # %s?', $query['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Regions'); ?></h3>
        <?php if (!empty($question['Region'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($question['Region'] as $region):
                                ?>
                                <tr>
                                        <td><?php echo $region['id']; ?></td>
                                        <td><?php echo $region['name']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'regions', 'action' => 'view', $region['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'regions', 'action' => 'edit', $region['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'regions', 'action' => 'delete', $region['id']), null, __('Are you sure you want to delete # %s?', $region['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
