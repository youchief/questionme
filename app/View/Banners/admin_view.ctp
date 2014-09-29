<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
                <div class="item active">
                        <?php echo $this->Html->image($banner['Banner']['background'])?>
                        <div class="carousel-caption">
                                <h1><?php echo h($banner['Banner']['title']); ?></h1>
                                <p><?php echo h($banner['Banner']['subtitle']); ?></p>
                        </div>
                </div>

        </div>
</div>



<div class="banners view">
        
        <dl>
               
                <dt><?php echo __('Start'); ?></dt>
                <dd>
                        <?php echo h($banner['Banner']['start']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('End'); ?></dt>
                <dd>
                        <?php echo h($banner['Banner']['end']); ?>
                        &nbsp;
                </dd>
               
                <dt><?php echo __('Region'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($banner['Region']['name'], array('controller' => 'regions', 'action' => 'view', $banner['Region']['id'])); ?>
                        &nbsp;
                </dd>
        </dl>
</div>
<div class="actions">

        <div class="btn-group">
                <?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['id']), array('class' => 'btn btn-sm btn-default')); ?>
                <?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?> 
        </div>
</div>
