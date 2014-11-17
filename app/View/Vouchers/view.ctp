<div class='container'>
        <div class='col-sm-6'>
                <?php echo $this->Html->image($voucher['Voucher']['image'], array('class' => 'img-responsive')) ?>

                <div class="btn-group">
                        <?php echo $this->Html->link(__('Utiliser'), array('action' => 'use_it', $voucher['Voucher']['id']), array('class' => 'btn btn-success')); ?>       
                </div>
        </div>
        <div class='col-sm-6'>
                <h1><?php echo h($voucher['Voucher']['name']); ?></h1>
                <h2><?php echo h($voucher['Customer']['name']); ?></h2>
                <p>
                        <?php echo $voucher['Voucher']['description']; ?>
                </p>
                <h4><?php echo __('Validité'); ?></h4>
                <p><?php echo $this->Time->format('d/m/Y',$voucher['Voucher']['validity']); ?></p>
                <h4><?php echo __('Conditions'); ?></h4>
                <p>
                        <?php echo $voucher['Voucher']['conditions']; ?>
                </p>
        </div>
</div>

