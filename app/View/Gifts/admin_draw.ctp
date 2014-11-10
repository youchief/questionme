<div class="row">
        <div class="col-sm-12">
                <h1>And the winner is ...</h1>
                <h2>
                        <strong><?php echo $winner['User']['username'] ?></strong>
                </h2>
                <p>
                <div class="btn-group">
                        <?php echo $this->Html->link(__('Try Again'), array('action' => 'draw', $gift_id), array('class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link(__('Validate'), array('action' => 'validate', $winner['User']['id'], $gift_id), array('class' => 'btn btn-success btn-xs')); ?>
                </div>
                </p>
        </div>
</div>