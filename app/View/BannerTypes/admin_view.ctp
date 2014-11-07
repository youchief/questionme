<div class="customerTypes view">
        <h2><?php echo __('Customer Type'); ?></h2>
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($customerType['CustomerType']['id']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Name'); ?></dt>
                <dd>
                        <?php echo h($customerType['CustomerType']['name']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Description'); ?></dt>
                <dd>
                        <?php echo h($customerType['CustomerType']['description']); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Customer Type'), array('action' => 'edit', $customerType['CustomerType']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Customer Type'), array('action' => 'delete', $customerType['CustomerType']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $customerType['CustomerType']['id'])); ?> 
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related Customers'); ?></h3>
        <?php if (!empty($customerType['Customer'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table">
                        <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Code'); ?></th>
                                <th><?php echo __('Address'); ?></th>
                                <th><?php echo __('Zip'); ?></th>
                                <th><?php echo __('City'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($customerType['Customer'] as $customer):
                                ?>
                                <tr>
                                        <td><?php echo $customer['id']; ?></td>
                                        <td><?php echo $customer['name']; ?></td>
                                        <td><?php echo $customer['code']; ?></td>
                                        <td><?php echo $customer['address']; ?></td>
                                        <td><?php echo $customer['zip']; ?></td>
                                        <td><?php echo $customer['city']; ?></td>
                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'customers', 'action' => 'view', $customer['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'customers', 'action' => 'edit', $customer['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'customers', 'action' => 'delete', $customer['id']), null, __('Are you sure you want to delete # %s?', $customer['id'])); ?>
                                        </td>
                                </tr>
                <?php endforeach; ?>
                </table>
<?php endif; ?>

</div>
