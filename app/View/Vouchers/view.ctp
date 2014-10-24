<div class='container'>
        <div class='col-sm-6'>
                <?php echo $this->Html->image($voucher['Voucher']['image'], array('class' => 'img-responsive')) ?>
                
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Use'), array('action' => 'use_it', $voucher['Voucher']['id']), array('class' => 'btn btn-success')); ?>       
                </div>
        </div>
        <div class='col-sm-6'>
                <h1><?php echo h($voucher['Voucher']['name']); ?></h1>
                <h2><?php echo h($voucher['Customer']['name']); ?></h2>
                <p>
                        <?php echo h($voucher['Voucher']['description']); ?>
                </p>
                <h4><?php echo __('Validity'); ?></h4>
                <p><?php echo h($voucher['Voucher']['validity']); ?></p>
                <h4><?php echo __('Conditions'); ?></h4>
                <p>
                        <?php echo h($voucher['Voucher']['conditions']); ?>
                </p>
        </div>
</div>

