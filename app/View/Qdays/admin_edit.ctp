<div class="qdays form">
        <?php echo $this->Form->create('Qday'); ?>
        <fieldset>
                <legend><?php echo __('Admin Edit Qday'); ?></legend>
                <?php
                echo $this->Form->input('id', array('class' => 'form-control'));
                echo $this->Form->input('start', array('class' => 'form-control'));
                echo $this->Form->input('end', array('class' => 'form-control'));
                echo $this->Form->input('nb_qmobile', array('class' => 'form-control'));
                echo $this->Form->input('nb_qfixe', array('class' => 'form-control'));
                echo $this->Form->input('nb_qprofile', array('class' => 'form-control'));

                echo $this->Form->input('region_id', array('class' => 'form-control'));
                ?>
        </fieldset>
        <hr>
        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
        <?php echo $this->Form->end(); ?>
</div>
