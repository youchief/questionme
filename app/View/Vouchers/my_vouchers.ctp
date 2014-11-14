<div class='container'>
        <div class='row'>
                <div class='col-sm-12'>
                        <h1>Mes bons</h1>
                        <?php if (empty($user['Gift']) && empty($user['BigGift']) && empty($user['Voucher'])): ?>
                                <p class="lead">Rien ici pour le moment alors dépêche-toi de jouer ! </p>
                        <?php endif; ?>
                </div>
        </div>
        <div class='row'>
                <?php
                $i = 0;
                foreach ($user['BigGift'] as $bgift): $i++;
                        ?>
                        <?php if ($bgift['used'] == null): ?>
                                <div class='col-sm-4'>
                                        <div class='thumbnail bigGift'>
                                                <i class="fa fa-birthday-cake"> Gros cadeau</i>
                                                <?php echo $this->Html->image($bgift['media'], array('class' => 'img-responsive')) ?>
                                                <h3><?php echo $bgift['name'] ?></h3>
                                                <p>
                                                        <?php
                                                        echo $this->Text->truncate($bgift['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                        ?>
                                                </p>
                                                <?php if ($bgift['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'bigGifts', 'action' => 'use_it', $bgift['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Détail'), array('controller' => 'bigGifts', 'action' => 'view', $bgift['id']), array('class' => 'btn btn-default')) ?>
                                                        <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'bigGifts', 'action' => 'delete', $bgift['id']), array('class' => 'btn btn-danger'), __('Es-tu sûr ?')); ?>

                                                <?php else: ?>
                                                        <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $bgift['used']) ?></span></h3>
                                                <?php endif; ?>    
                                        </div>
                                </div>
                                <?php if ($i % 3 == 0): ?>
                                        <div class="clear"></div>
                                <?php endif; ?>
                        <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class='row'>
                <?php
                $i = 0;
                foreach ($user['Gift'] as $gift): $i++;
                        ?>
                        <?php if ($gift['used'] == null): ?>
                                <div class='col-sm-4'>
                                        <div class='thumbnail gift'>
                                                <i class="fa fa-gift"> Cadeau</i> 
                                                <?php echo $this->Html->image($gift['media'], array('class' => 'img-responsive')) ?>
                                                <h3><?php echo $gift['name'] ?></h3>
                                                <p>
                                                        <?php
                                                        echo $this->Text->truncate($gift['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                        ?>
                                                </p>
                                                <?php if ($gift['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'gifts', 'action' => 'use_it', $gift['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Détail'), array('controller' => 'gifts', 'action' => 'view', $gift['id']), array('class' => 'btn btn-default')) ?>
                                                        <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), array('class' => 'btn btn-danger'), __('Es-tu sûr ?')); ?>


                                                <?php else: ?>
                                                        <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $gift['used']) ?></span></h3>
                                                <?php endif; ?>    
                                        </div>
                                </div>
                                <?php if ($i % 3 == 0): ?>
                                        <div class="clear"></div>
                                <?php endif; ?>
                        <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class='row'>
                <?php
                $i = 0;
                foreach ($user['Voucher'] as $voucher):$i++
                        ?>
                        <?php if ($voucher['UserVoucher']['used'] == null): ?>
                                <div class='col-sm-4'>
                                        <div class='thumbnail voucher'>
                                                <i class="fa fa-barcode"> Bon de réduction</i>
                                                <?php echo $this->Html->image($voucher['image'], array('class' => 'img-responsive')) ?>
                                                <h3><?php echo $voucher['name'] ?></h3>
                                                <p>
                                                        <?php
                                                        echo $this->Text->truncate($voucher['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                        ?>
                                                </p>
                                                <?php if ($voucher['UserVoucher']['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'vouchers', 'action' => 'use_it', $voucher['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Détail'), array('controller' => 'vouchers', 'action' => 'view', $voucher['id']), array('class' => 'btn btn-default')) ?>
                                                        <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'vouchers', 'action' => 'delete', $voucher['UserVoucher']['id']), array('class' => 'btn btn-danger'), __('Es-tu sûr ?')); ?>

                                                <?php else: ?>
                                                        <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $voucher['UserVoucher']['used']) ?></span></h3>
                                                <?php endif; ?>    
                                        </div>
                                </div>
                                <?php if ($i % 3 == 0): ?>
                                        <div class="clear"></div>
                                <?php endif; ?>
                        <?php endif; ?>
                <?php endforeach; ?>
        </div>
</div>

