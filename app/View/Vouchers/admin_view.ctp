<div class="row">
        <div class='col-sm-6'>
                <div class='thumbnail voucher'>
                        <i class="fa fa-barcode"> Bon de réduction</i> 
                        <div class="clear"></div>
                        <?php echo $this->Html->image($voucher['Voucher']['image'], array('class' => 'img-responsive')) ?>
                        <h3><?php echo $voucher['Voucher']['name'] ?></h3>
                        <p>
                                <?php
                                echo $this->Text->truncate($voucher['Voucher']['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                ?>
                        </p>

                </div>
        </div>

        <div class="col-sm-6">
                <dl>
                        <dt><?php echo __('Id'); ?></dt>
                        <dd>
                                <?php echo h($voucher['Voucher']['id']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Nb User Vouchers'); ?></dt>
                        <dd>
                                <?php echo count($voucher['User']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Nb User Vouchers Used'); ?></dt>
                        <dd>
                                <?php
                                $i = 0;
                                foreach ($voucher['User'] as $user) {
                                        if ($user['UserVoucher']['used'] <> null) {
                                                $i++;
                                        }
                                }
                                echo $i;
                                ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Date'); ?></dt>
                        <dd>
                                <?php echo h($voucher['Voucher']['date']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Name'); ?></dt>
                        <dd>
                                <?php echo h($voucher['Voucher']['name']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Description'); ?></dt>
                        <dd>
                                <?php echo $voucher['Voucher']['description']; ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Validity'); ?></dt>
                        <dd>
                                <?php echo h($voucher['Voucher']['validity']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Conditions'); ?></dt>
                        <dd>
                                <?php echo $voucher['Voucher']['conditions']; ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Customer'); ?></dt>
                        <dd>
                                <?php echo $this->Html->link($voucher['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $voucher['Customer']['id'])); ?>
                                &nbsp;
                        </dd>
                </dl>
                <div class="actions">
                        <div class="btn-group">
                                <?php echo $this->Html->link(__('Edit Voucher'), array('action' => 'edit', $voucher['Voucher']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                                <?php echo $this->Form->postLink(__('Delete Voucher'), array('action' => 'delete', $voucher['Voucher']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $voucher['Voucher']['id'])); ?> 
                        </div>
                </div>
        </div>
</div>
<div class="related">
        <h3><?php echo __('Related User Vouchers'); ?></h3>


        <table cellpadding = "0" cellspacing = "0" class='table'>
                <tr>
                        <th><?php echo __('Username'); ?></th>
                        <th><?php echo __('Email'); ?></th>
                        <th><?php echo __('Used'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($voucher['User'] as $user):
                        ?>
                        <?php if ($user['UserVoucher']['used'] <> null): ?>
                                <tr>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['UserVoucher']['used']; ?></td>


                                        <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>

                                        </td>
                                </tr>
                        <?php endif; ?>
                <?php endforeach; ?>
        </table>

</div>