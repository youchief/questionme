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
        </div>
</div>

