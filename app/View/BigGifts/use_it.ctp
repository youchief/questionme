<div class='container'>
        <div class='col-sm-6 col-sm-offset-3'>
                <div class='thumbnail'>
                        <div class='customer_voucher'><?php echo h($bigGift['Customer']['name']); ?></div>
                        <?php echo $this->Html->image($bigGift['BigGift']['media'], array('class' => 'img-responsive')) ?>
                        <h3><?php echo h($bigGift['BigGift']['name']); ?></h3>
                        <?php echo $this->Form->create('BigGift'); ?>
                        <?php echo $this->Session->flash();?>
                        <?php
                        echo $this->Form->input('code', array('class' => 'form-control password', 'type'=>'password', 'pattern'=>"[0-9]*", 'maxlength'=>"4", 'after'=>'Pour utiliser le bon, présente ton téléphone au partenaire.'));
                        ?>                      
                        <hr>
                        <?php echo $this->Form->submit(__('Utiliser'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
</div>

