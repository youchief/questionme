<div class="container form">
        <div class="row">
                <div class="col-sm-6 col-xs-8">
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>
                                <h3><?php echo __('Change ton mot de passe'); ?></h3>
                                <?php
                                echo $this->Form->input('id', array('class' => 'form-control'));
                                echo $this->Form->input('new_password', array('class' => 'form-control required', 'type'=>'password', 'label'=>'Nouveau mot de passe', 'required' => 'required'));
                                echo $this->Form->input('retype_password', array('class' => 'form-control required','type'=>'password', 'label'=>'Confirmation de mot de passe', 'required' => 'required'));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('OK'), array('class' => 'btn btn-success btn-lg', "onsubmit" => "return validateForm();")); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
</div>
