<div class="customers view">
        <h2><?php echo h($customer['Customer']['name']); ?></h2>
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['id']); ?>
                        &nbsp;
                </dd>

                <dt><?php echo __('Code'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['code']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Address'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['address']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Zip'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['zip']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('City'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['city']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Country'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['country']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Phone'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['phone']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Email'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['email']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Description'); ?></dt>
                <dd>
                        <?php echo h($customer['Customer']['description']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Customer Type'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($customer['CustomerType']['name'], array('controller' => 'customer_types', 'action' => 'view', $customer['CustomerType']['id'])); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Customer'), array('action' => 'edit', $customer['Customer']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $customer['Customer']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> 
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related Gifts'); ?></h3>
        <?php if (!empty($customer['Gift'])): ?>
                <table cellpadding = "0" cellspacing = "0">
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
                        foreach ($customer['Gift'] as $gift):
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
<div class="related">
        <h3><?php echo __('Related Orders'); ?></h3>
<?php if (!empty($customer['Order'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Active'); ?></th>
                                <th><?php echo __('Repondants'); ?></th>
                                <th><?php echo __('Nb Questions'); ?></th>
                                <th><?php echo __('Customer Id'); ?></th>
                                <th><?php echo __('Order Type Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($customer['Order'] as $order):
                                ?>
                                <tr>
                                        <td><?php echo $order['id']; ?></td>
                                        <td><?php echo $order['created']; ?></td>
                                        <td><?php echo $order['active']; ?></td>
                                        <td><?php echo $order['repondants']; ?></td>
                                        <td><?php echo $order['nb_questions']; ?></td>
                                        <td><?php echo $order['customer_id']; ?></td>
                                        <td><?php echo $order['order_type_id']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
                                        </td>
                                </tr>
                <?php endforeach; ?>
                </table>
<?php endif; ?>

</div>
<div class="related">
        <h3><?php echo __('Related Vouchers'); ?></h3>
<?php if (!empty($customer['Voucher'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Date'); ?></th>
                                <th><?php echo __('Used'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Code'); ?></th>
                                <th><?php echo __('Customer Id'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($customer['Voucher'] as $voucher):
                                ?>
                                <tr>
                                        <td><?php echo $voucher['id']; ?></td>
                                        <td><?php echo $voucher['created']; ?></td>
                                        <td><?php echo $voucher['date']; ?></td>
                                        <td><?php echo $voucher['used']; ?></td>
                                        <td><?php echo $voucher['name']; ?></td>
                                        <td><?php echo $voucher['code']; ?></td>
                                        <td><?php echo $voucher['customer_id']; ?></td>
                                        <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'vouchers', 'action' => 'view', $voucher['id'])); ?>
                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'vouchers', 'action' => 'edit', $voucher['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vouchers', 'action' => 'delete', $voucher['id']), null, __('Are you sure you want to delete # %s?', $voucher['id'])); ?>
                                        </td>
                                </tr>
        <?php endforeach; ?>
                </table>
<?php endif; ?>

</div>
