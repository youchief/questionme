<div class='container'>
        <div class='row'>
                <?php foreach ($user['BigGift'] as $bgift): ?>
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
                                                <?php echo $this->Html->link(__('Voir'), array('controller' => 'bigGifts', 'action' => 'view', $bgift['id']), array('class' => 'btn btn-default')) ?>
                                        <?php else: ?>
                                                <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $bgift['used']) ?></span></h3>
                                        <?php endif; ?>    
                                </div>
                        </div>
                <?php endforeach; ?>
        </div>
        <div class='row'>
                <?php foreach ($user['Gift'] as $gift): ?>
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
                                                <?php echo $this->Html->link(__('Voir'), array('controller' => 'gifts', 'action' => 'view', $gift['id']), array('class' => 'btn btn-default')) ?>
                                        <?php else: ?>
                                                <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $gift['used']) ?></span></h3>
                                        <?php endif; ?>    
                                </div>
                        </div>
                <?php endforeach; ?>
        </div>
        <div class='row'>
                <?php foreach ($user['Voucher'] as $voucher): ?>
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
                                                <?php echo $this->Html->link(__('Voir'), array('controller' => 'vouchers', 'action' => 'view', $voucher['id']), array('class' => 'btn btn-default')) ?>
                                        <?php else: ?>
                                                <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $voucher['UserVoucher']['used']) ?></span></h3>
                                                <?php endif; ?>    
                                </div>
                        </div>
                <?php endforeach; ?>
        </div>
</div>

