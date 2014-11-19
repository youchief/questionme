<div class="gifts view">
        <div class="row">
                <div class='col-sm-6'>
                        <div class='thumbnail gift'>
                                <i class="fa fa-gift"> Cadeau</i>  
                                <?php echo $this->Html->image($gift['Gift']['media'], array('class' => 'img-responsive')) ?>
                                <h3><?php echo $gift['Gift']['name'] ?></h3>
                                <p>
                                        <?php
                                        echo $this->Text->truncate($gift['Gift']['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                        ?>
                                </p>

                        </div>
                </div>
                <div class="col-sm-6">
                        <dl>
                                <dt><?php echo __('Id'); ?></dt>
                                <dd>
                                        <?php echo h($gift['Gift']['id']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Created'); ?></dt>
                                <dd>
                                        <?php echo h($gift['Gift']['created']); ?>
                                        &nbsp;
                                </dd>


                                <dt><?php echo __('Validity'); ?></dt>
                                <dd>
                                        <?php echo h($gift['Gift']['validity']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Conditions'); ?></dt>
                                <dd>
                                        <?php echo $gift['Gift']['conditions']; ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Used'); ?></dt>
                                <dd>
                                        <?php echo h($gift['Gift']['used']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Customer'); ?></dt>
                                <dd>
                                        <?php echo $this->Html->link($gift['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $gift['Customer']['id'])); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Winner Id'); ?></dt>
                                <dd>
                                        <?php echo $this->Html->link($winner['User']['username'], array('controller' => 'users', 'action' => 'view', $winner['User']['id'])); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Qday'); ?></dt>
                                <dd>
                                        <?php echo $this->Html->link($gift['Qday']['start'], array('controller' => 'qdays', 'action' => 'view', $gift['Qday']['id'])); ?>
                                        &nbsp;
                                </dd>
                        </dl>
                        <div class="btn-group">
                                <?php echo $this->Html->link(__('Edit Gift'), array('action' => 'edit', $gift['Gift']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                                <?php echo $this->Form->postLink(__('Delete Gift'), array('action' => 'delete', $gift['Gift']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?> 
                                <?php echo $this->Html->link(__('Drawing lots'), array('action' => 'draw', $gift['Gift']['id']), array('class' => 'btn btn-sm btn-success')); ?>

                        </div>
                </div>
        </div>

</div>