<div class='container'>
        <div class='col-sm-6 col-sm-offset-3'>
                <div class='thumbnail'>
                        <div class='customer_voucher'><?php echo h($voucher['Customer']['name']); ?></div>
                        <?php echo $this->Html->image($voucher['Voucher']['image'], array('class' => 'img-responsive')) ?>
                        <h3><?php echo h($voucher['Voucher']['name']); ?></h3>
                        <?php echo $this->Form->create('Voucher'); ?>

                        
                        <?php
                        echo $this->Form->input('code', array('class' => 'form-control'));
                        ?>

                        <hr>
                        <?php echo $this->Form->submit(__('Use'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>

        </div>
</div>

