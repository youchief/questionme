<div class="row">
        <div class='col-sm-6'>
                <div class='thumbnail gift'>
                        <i class="fa fa-birthday-cake"> Cadeau</i>  
                        <?php echo $this->Html->image($bigGift['BigGift']['media'], array('class' => 'img-responsive')) ?>
                        <h3><?php echo $bigGift['BigGift']['name'] ?></h3>
                        <p>
                                <?php
                                echo $this->Text->truncate($bigGift['BigGift']['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                ?>
                        </p>

                </div>
        </div>
        <div class="col-sm-6">
                <dl>
                        <dt><?php echo __('Id'); ?></dt>
                        <dd>
                                <?php echo h($bigGift['BigGift']['id']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Created'); ?></dt>
                        <dd>
                                <?php echo h($bigGift['BigGift']['created']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Validity'); ?></dt>
                        <dd>
                                <?php echo h($bigGift['BigGift']['validity']); ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Conditions'); ?></dt>
                        <dd>
                                <?php echo $bigGift['BigGift']['conditions']; ?>
                                &nbsp;
                        </dd>
                        <dt><?php echo __('Winner'); ?></dt>
                        <dd>
                                <?php echo $this->Html->link($winner['User']['username'], array('controller' => 'users', 'action' => 'view', $winner['User']['id'])); ?>
                                &nbsp;
                        </dd>   
                        <dt><?php echo __('Qweek'); ?></dt>
                        <dd>
                                <?php echo $this->Html->link($bigGift['Qweek']['full_name'], array('controller' => 'qweeks', 'action' => 'view', $bigGift['Qweek']['id'])); ?>
                                &nbsp;
                        </dd>
                </dl>
                <div class="actions">

                        <div class="btn-group">
                                <?php echo $this->Html->link(__('Edit Big Gift'), array('action' => 'edit', $bigGift['BigGift']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                                <?php echo $this->Form->postLink(__('Delete Big Gift'), array('action' => 'delete', $bigGift['BigGift']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $bigGift['BigGift']['id'])); ?> 
                                <?php echo $this->Html->link(__('Drawing lots'), array('action' => 'draw', $bigGift['BigGift']['id']), array('class' => 'btn btn-sm btn-success')); ?>


                        </div>
                </div>

        </div>
</div>

