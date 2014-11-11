<div class='container'>
        <div class='col-sm-6'>
                <?php echo $this->Html->image($bigGift['BigGift']['media'], array('class' => 'img-responsive')) ?>
                
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Utiliser'), array('action' => 'use_it', $bigGift['BigGift']['id']), array('class' => 'btn btn-success')); ?>       
                </div>
        </div>
        <div class='col-sm-6'>
                <h1><?php echo h($bigGift['BigGift']['name']); ?></h1>
                <h2><?php echo h($bigGift['Customer']['name']); ?></h2>
                <p>
                        <?php echo h($bigGift['BigGift']['description']); ?>
                </p>
        </div>
</div>

