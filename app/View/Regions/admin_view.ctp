<div class="regions view">
        <h2><?php echo h($region['Region']['name']); ?></h2>
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($region['Region']['id']); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Region'), array('action' => 'edit', $region['Region']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Region'), array('action' => 'delete', $region['Region']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $region['Region']['id'])); ?> 
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related Banners'); ?></h3>
        <?php if (!empty($region['Banner'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Start'); ?></th>
                                <th><?php echo __('End'); ?></th>
                                <th><?php echo __('Background'); ?></th>
                                <th><?php echo __('Title'); ?></th>
                                <th><?php echo __('Subtitle'); ?></th>
                                <th><?php echo __('Region Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($region['Banner'] as $banner):
                                ?>
                                <tr>
                                        <td><?php echo $banner['id']; ?></td>
                                        <td><?php echo $banner['start']; ?></td>
                                        <td><?php echo $banner['end']; ?></td>
                                        <td><?php echo $banner['background']; ?></td>
                                        <td><?php echo $banner['title']; ?></td>
                                        <td><?php echo $banner['subtitle']; ?></td>
                                        <td><?php echo $banner['region_id']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'banners', 'action' => 'view', $banner['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'banners', 'action' => 'edit', $banner['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'banners', 'action' => 'delete', $banner['id']), null, __('Are you sure you want to delete # %s?', $banner['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Users'); ?></h3>
        <?php if (!empty($region['User'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('username'); ?></th>
                                <th><?php echo __('birthday'); ?></th>
                                <th><?php echo __('sex'); ?></th>
                                <th><?php echo __('email'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($region['User'] as $user):
                                ?>
                                <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['birthday']; ?></td>
                                        <td><?php echo $user['sex']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Qdays'); ?></h3>
        <?php if (!empty($region['Qday'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Start'); ?></th>
                                <th><?php echo __('End'); ?></th>
                                <th><?php echo __('Nb Qmobile'); ?></th>
                                <th><?php echo __('Nb Qfixe'); ?></th>
                                <th><?php echo __('Region Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($region['Qday'] as $qday):
                                ?>
                                <tr>
                                        <td><?php echo $qday['id']; ?></td>
                                        <td><?php echo $qday['start']; ?></td>
                                        <td><?php echo $qday['end']; ?></td>
                                        <td><?php echo $qday['nb_qmobile']; ?></td>
                                        <td><?php echo $qday['nb_qfixe']; ?></td>
                                        <td><?php echo $qday['region_id']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'qdays', 'action' => 'view', $qday['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'qdays', 'action' => 'edit', $qday['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'qdays', 'action' => 'delete', $qday['id']), null, __('Are you sure you want to delete # %s?', $qday['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Qweeks'); ?></h3>
        <?php if (!empty($region['Qweek'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Start'); ?></th>
                                <th><?php echo __('End'); ?></th>
                                <th><?php echo __('Region Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($region['Qweek'] as $qweek):
                                ?>
                                <tr>
                                        <td><?php echo $qweek['id']; ?></td>
                                        <td><?php echo $qweek['start']; ?></td>
                                        <td><?php echo $qweek['end']; ?></td>
                                        <td><?php echo $qweek['region_id']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'qweeks', 'action' => 'view', $qweek['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'qweeks', 'action' => 'edit', $qweek['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'qweeks', 'action' => 'delete', $qweek['id']), null, __('Are you sure you want to delete # %s?', $qweek['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Questions'); ?></h3>
        <?php if (!empty($region['Question'])): ?>
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
                        foreach ($region['Question'] as $question):
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
