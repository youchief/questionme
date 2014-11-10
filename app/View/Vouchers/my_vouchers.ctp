<div class='container'>
        <div class='row'>
                <?php foreach ($vouchers as $voucher): ?>
                        <div class='col-sm-4'>
                                <div class='thumbnail'>
                                        <?php echo $this->Html->image($voucher['image'], array('class' => 'img-responsive')) ?>
                                        <h3><?php echo $voucher['name'] ?></h3>
                                        <p>
                                                <?php
                                                echo $this->Text->truncate($voucher['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                ?>
                                        </p>
                                        <p>
                                                <?php if ($voucher['UserVoucher']['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'vouchers', 'action' => 'use_it', $voucher['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Voir'), array('controller' => 'vouchers', 'action' => 'view', $voucher['id']), array('class' => 'btn btn-default')) ?>

                                                <?php else: ?>
                                                <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $voucher['UserVoucher']['used']) ?></span></h3>
                                                <?php endif; ?>
                                        </p>
                                </div>
                        </div>
                <?php endforeach; ?>
        </div>
</div>

