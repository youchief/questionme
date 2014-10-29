<div class="queries form">
        <?php echo $this->Form->create('Query'); ?>
        <fieldset>
                <legend><?php echo __('Admin Add Query'); ?></legend>
                <?php
                echo $this->Form->input('key', array('class' => 'form-control', 'type' => 'select', 'options' => $quest));
                echo $this->Form->input('sign', array('class' => 'form-control', 'type' => 'select', 'options' => array('=' => '=', '<' => '<', '>' => '>', '>=' => '>=', '<=' => '<=')));
                echo $this->Form->input('value', array('class' => 'form-control', 'type' => 'select', 'options' => $choices));
                ?>
        </fieldset>
        <hr>
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                <hr>
                <?php echo $this->Html->link(__('Next'), array('controller' => 'choices', 'action' => 'wizard', $this->params['pass'][0]), array('class' => 'btn btn-primary')); ?>
                <?php echo $this->Form->end(); ?>
</div>