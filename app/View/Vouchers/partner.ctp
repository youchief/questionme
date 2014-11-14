<div class='container'>
        <div class='col-sm-6 col-sm-offset-3'>
                <div class='thumbnail'>
                        <div class='customer_voucher'><?php echo h($customer); ?></div>
                        <h3><?php echo h($voucher); ?></h3>
                        <h4>Utilisé le : <?php echo $this->Time->format('d/m/y H:s', $used)?></h4>
                        <?php echo $this->Html->image($img, array('class' => 'img-responsive')) ?>
                        <br>
                        <?php echo $this->Html->link('Fermer', array('controller'=>'vouchers', 'action'=>'my_vouchers'), array('class'=>'btn btn-default'))?>
                </div>
        </div>
</div>