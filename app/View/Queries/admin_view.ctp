<div class="queries view">
        <h2><?php echo __('Query'); ?></h2>
        <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($query['Query']['id']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Key'); ?></dt>
                <dd>
                        <?php echo h($query['Query']['key']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Value'); ?></dt>
                <dd>
                        <?php echo h($query['Query']['value']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Sign'); ?></dt>
                <dd>
                        <?php echo h($query['Query']['sign']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Question'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($query['Question']['question'], array('controller' => 'questions', 'action' => 'view', $query['Question']['id'])); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Query'), array('action' => 'edit', $query['Query']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Query'), array('action' => 'delete', $query['Query']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $query['Query']['id'])); ?> 
        </div>
</div>
