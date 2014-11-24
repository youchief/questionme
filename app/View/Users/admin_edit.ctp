<div class="users form">
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
                <legend><?php echo __('Admin Edit User'); ?></legend>
                <?php
                echo $this->Form->input('id', array('class' => ''));
                echo $this->Form->input('active', array('class' => 'checkbox'));
                echo $this->Form->input('username', array('class' => 'form-control'));
                //echo $this->Form->input('password', array('class' => 'form-control'));
                echo $this->Form->input('birthday', array('class' => 'form-control', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                echo $this->Form->input('email', array('class' => 'form-control'));
                echo $this->Form->input('newsletter', array('class' => 'checkbox'));
                echo $this->Form->input('group_id', array('class' => 'form-control'));
                echo $this->Form->input('region_id', array('class' => 'form-control'));
                ?>
        </fieldset>
        <hr>
        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
        <?php echo $this->Form->end(); ?>
</div>
