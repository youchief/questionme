<div class="row">
        <div class="col-sm-12">
                <h1>And the winner is ...</h1>
                <h2>
                        <strong><?php echo $user['User']['username'] ?></strong>
                </h2>

                <div class="users view">
                        <dl>
                                <dt><?php echo __('Id'); ?></dt>
                                <dd>
                                        <?php echo h($user['User']['id']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Created'); ?></dt>
                                <dd>
                                        <?php echo h($user['User']['created']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Sex'); ?></dt>
                                <dd>
                                        <?php echo h($user['User']['sex']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Email'); ?></dt>
                                <dd>
                                        <?php echo h($user['User']['email']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Region'); ?></dt>
                                <dd>
                                        <?php echo $this->Html->link($user['Region']['name'], array('controller' => 'regions', 'action' => 'view', $user['Region']['id'])); ?>
                                        &nbsp;
                                </dd>
                        </dl>
                </div>
                <div class="related">
                        <h3><?php echo __('Related Gifts'); ?></h3>
                        <?php if (!empty($user['Gift'])): ?>
                                <table cellpadding = "0" cellspacing = "0"  class='table'>
                                        <tr>
                                                <th><?php echo __('Created'); ?></th>
                                                <th><?php echo __('Name'); ?></th>
                                                <th><?php echo __('Used'); ?></th>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        foreach ($user['Gift'] as $gift):
                                                ?>
                                                <tr>
                                                        <td><?php echo $gift['created']; ?></td>
                                                        <td><?php echo $gift['name']; ?></td>
                                                        <td><?php echo $gift['used']; ?></td>
                                                </tr>
                                        <?php endforeach; ?>
                                </table>
                        <?php endif; ?>

                </div>
                <div class="related">
                        <h3><?php echo __('Related BigGifts'); ?></h3>
                        <?php if (!empty($user['BigGift'])): ?>
                                <table cellpadding = "0" cellspacing = "0"  class='table'>
                                        <tr>
                                                <th><?php echo __('Created'); ?></th>
                                                <th><?php echo __('Name'); ?></th>
                                                <th><?php echo __('Used'); ?></th>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        foreach ($user['Gift'] as $gift):
                                                ?>
                                                <tr>
                                                        <td><?php echo $gift['created']; ?></td>
                                                        <td><?php echo $gift['name']; ?></td>
                                                        <td><?php echo $gift['used']; ?></td>
                                                </tr>
                                        <?php endforeach; ?>
                                </table>
                        <?php endif; ?>

                </div>

                <div class="related">
                        <h3><?php echo __('Related Voucher'); ?></h3>
                        <?php if (!empty($user['Voucher'])): ?>
                                <table cellpadding = "0" cellspacing = "0"  class='table'>
                                        <tr>
                                                <th><?php echo __('Nb'); ?></th>
                                                <th><?php echo __('Nb Used'); ?></th>
                                        </tr>
                                        <tr>
                                                <td><?php echo count($user['Voucher']); ?></td>
                                                
                                                <?php 
                                                        $i=0;
                                                foreach($user['Voucher'] as $vouch){
                                                        if(!$vouch['UserVoucher']['used'] == null){
                                                                $i++;
                                                        }
                                                }
                                                ?>
                                                
                                                <td><?php echo $i; ?></td>
                                        </tr>
                                </table>
                        <?php endif; ?>

                </div>
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Try Again'), array('action' => 'draw', $gift_id), array('class' => 'btn btn-primary ')); ?>
                        <?php echo $this->Html->link(__('Validate'), array('action' => 'validate', $user['User']['id'], $gift_id), array('class' => 'btn btn-success ')); ?>
                </div>
        </div>
</div>