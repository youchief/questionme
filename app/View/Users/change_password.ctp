<div class="container form">
        <div class="row">
                <div class="col-sm-6">
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>
                                <legend><?php echo __('Change ton mot de passe'); ?></legend>
                                <?php
                                echo $this->Form->input('id', array('class' => 'form-control'));
                                echo $this->Form->input('new_password', array('class' => 'form-control', 'type'=>'password', 'label'=>'Nouveau mot de passe'));
                                echo $this->Form->input('retype_password', array('class' => 'form-control','type'=>'password', 'label'=>'Confirmation de mot de passe'));
                                ?>
                        </fieldset>
                        <hr>
                        <?php echo $this->Form->submit(__('OK'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class='col-sm-6'>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus, metus vitae porttitor iaculis, augue est ornare massa, pharetra blandit mi tellus et velit. Donec vitae dictum purus. Aliquam erat volutpat. Maecenas eget feugiat nunc. Etiam ac interdum leo. Nullam lacinia sapien consectetur dolor pellentesque, et mollis ante scelerisque. Nunc arcu nisi, venenatis eget tellus a, tristique imperdiet neque. Vivamus a sagittis risus. Etiam sit amet felis eu nunc lacinia bibendum. Proin luctus orci eu dolor vestibulum mattis. Pellentesque scelerisque facilisis mauris at interdum. Aenean ac ipsum a lectus rhoncus aliquam ac non lorem. Integer risus est, tempor vel quam sit amet, tempor tincidunt sem.
                </div>
        </div>
</div>