<div class='container'>
        <div class='col-sm-6'>
                <?php echo $this->Html->image($gift['Gift']['media'], array('class' => 'img-responsive')) ?>
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Utiliser'), array('action' => 'use_it', $gift['Gift']['id']), array('class' => 'btn btn-success')); ?>       
                </div>
        </div>
        <div class='col-sm-6'>
                <h1><?php echo h($gift['Gift']['name']); ?></h1>
                <h2><?php echo h($gift['Customer']['name']); ?></h2>
                <p>
                        <?php echo h($gift['Gift']['description']); ?>
                </p>
                <h4><?php echo __('Validité'); ?></h4>
                <p><?php echo $this->Time->format('d/m/Y',$gift['Gift']['validity']); ?></p>
                <h4><?php echo __('Conditions'); ?></h4>
                <p>
                        <?php echo h($gift['Gift']['conditions']); ?>
                </p>
        </div>
</div>

