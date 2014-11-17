<div class="users view">
        <h2><?php echo h($user['User']['username']); ?></h2>
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($user['User']['id']); ?>
                        &nbsp;
                </dd>

                <dt><?php echo __('Password'); ?></dt>
                <dd>
                        <?php echo h($user['User']['password']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Birthday'); ?></dt>
                <dd>
                        <?php echo h($user['User']['birthday']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Email'); ?></dt>
                <dd>
                        <?php echo h($user['User']['email']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Newsletter'); ?></dt>
                <dd>
                        <?php echo h($user['User']['newsletter']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Group'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Region'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($user['Region']['name'], array('controller' => 'regions', 'action' => 'view', $user['Region']['id'])); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> 
        </div>
</div>

<div class="related">
        <h3><?php echo __('Related Profiles'); ?></h3>
        <?php if (!empty($user['Profile'])): ?>
                <table cellpadding = "0" cellspacing = "0" class='table'>
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('key'); ?></th>
                                <th><?php echo __('value'); ?></th>

                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($user['Profile'] as $profile):
                                ?>
                                <tr>
                                        <td><?php echo $profile['id']; ?></td>
                                        <td><?php echo $profile['key']; ?></td>
                                        <td><?php echo $profile['value']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'profiles', 'action' => 'view', $profile['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'profiles', 'action' => 'edit', $profile['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'profiles', 'action' => 'delete', $profile['id']), null, __('Are you sure you want to delete # %s?', $profile['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related User Vouchers'); ?></h3>
        <?php if (!empty($user['Voucher'])): ?>

                <table cellpadding = "0" cellspacing = "0" class='table'>
                        <tr>
                                <th><?php echo __('Image'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Used'); ?></th>

                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($user['Voucher'] as $voucher):
                                ?>
                                <tr>
                                        <td><?php echo $this->Html->image($voucher['image'], array('width' => '80px')); ?></td>
                                        <td><?php echo $voucher['name']; ?></td>
                                        <td><?php echo $voucher['UserVoucher']['created']; ?></td>
                                        <td><?php echo $voucher['UserVoucher']['used']; ?></td>


                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'user_vouchers', 'action' => 'view', $voucher['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'user_vouchers', 'action' => 'edit', $voucher['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_vouchers', 'action' => 'delete', $voucher['id']), null, __('Are you sure you want to delete # %s?', $voucher['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Choices'); ?></h3>
        <?php if (!empty($user['Choice'])): ?>
                <table cellpadding = "0" cellspacing = "0"  class='table'>
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Question Id'); ?></th>
                                <th><?php echo __('Response'); ?></th>

                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($user['Choice'] as $choice):
                                ?>
                                <tr>
                                        <td><?php echo $choice['id']; ?></td>
                                        <td><?php echo $choice['Question']['question']; ?></td>
                                        <td><?php echo $choice['response']; ?></td>
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
        <h3><?php echo __('Related Gifts'); ?></h3>
        <?php if (!empty($user['Gift'])): ?>
                <table cellpadding = "0" cellspacing = "0"  class='table'>
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Used'); ?></th>
                                <th><?php echo __('Customer Id'); ?></th>
                                <th><?php echo __('Winner Id'); ?></th>
                                <th><?php echo __('Qday Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($user['Gift'] as $gift):
                                ?>
                                <tr>
                                        <td><?php echo $gift['id']; ?></td>
                                        <td><?php echo $gift['created']; ?></td>
                                        <td><?php echo $gift['name']; ?></td>
                                        <td><?php echo $gift['used']; ?></td>
                                        <td><?php echo $gift['customer_id']; ?></td>
                                        <td><?php echo $gift['winner_id']; ?></td>
                                        <td><?php echo $gift['qday_id']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $gift['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $gift['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), null, __('Are you sure you want to delete # %s?', $gift['id'])); ?>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        <?php endif; ?>

</div>
