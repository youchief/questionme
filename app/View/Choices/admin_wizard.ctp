<div class="choices form">
        <?php echo $this->Form->create('Choice', array('type' => 'file')); ?>
        <fieldset>
                <legend><?php echo __('Admin Add Choice'); ?></legend>
                <?php
                echo $this->Form->input('response', array('class' => 'form-control'));
                echo $this->Form->input('is_right', array('class' => 'checkbox'));
                echo $this->Form->input('type', array('class' => 'form-control', 'type' => 'select', 'options' => array('RADIO' => 'RADIO', 'CHECKBOX' => 'CHECKBOX', 'SCALE' => 'SCALE', 'FREE' => 'FREE')));
                echo $this->Form->input('media', array('class' => 'form-control', 'type' => 'file'));
                //echo $this->Form->input('media_type', array('class' => 'form-control'));
                ?>
        </fieldset>
        <hr>
        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
        <hr>
        <?php echo $this->Html->link(__('Finish'), array('controller' => 'questions', 'action' => 'view', $this->params['pass'][0]), array('class' => 'btn btn-danger')); ?>

        <?php echo $this->Form->end(); ?>
</div>
