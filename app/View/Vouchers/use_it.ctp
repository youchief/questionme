<div class='container'>
        <div class='col-sm-6 col-sm-offset-3'>
                <div class='thumbnail'>
                        <div class='customer_voucher'><?php echo h($voucher['Customer']['name']); ?></div>
                        <?php echo $this->Html->image($voucher['Voucher']['image'], array('class' => 'img-responsive')) ?>
                        <h3><?php echo h($voucher['Voucher']['name']); ?></h3>
                        <?php echo $this->Form->create('Voucher'); ?>
                        <?php echo $this->Session->flash();?>
                        <?php
                        echo $this->Form->input('code', array('class' => 'form-control password', 'type'=>'number', 'pattern'=>"[0-9]*", 'maxlength'=>"4", 'after'=>'Pour utiliser le bon, présente ton téléphone au partenaire.'));
                        ?>                      
                        <hr>
                        <p style="font-weight: 300;">Présente ton téléphone au partenaire pour qu'il valide ton bon !</p>
                        <?php echo $this->Form->submit(__('Utiliser'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
        <div class='col-sm-6 col-sm-offset-3 align-center'>
            <?php echo $this->Html->link(__('Revenir à mes bons'), array('controller' => 'vouchers', 'action' => 'my_vouchers'), array('class' => 'btn btn-default btn-lg')) ?><br/><br/>
        </div>
    
</div>

