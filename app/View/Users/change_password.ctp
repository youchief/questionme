<div class="container form">
        <div class="row">
                <div class="col-sm-6 col-xs-8">
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>
                                <h3><?php echo __('Change ton mot de passe'); ?></h3>
                                <?php
                                echo $this->Form->input('id', array('class' => 'form-control'));
                                echo $this->Form->input('new_password', array('class' => 'form-control', 'type'=>'password', 'label'=>'Nouveau mot de passe'));
                                echo $this->Form->input('retype_password', array('class' => 'form-control','type'=>'password', 'label'=>'Confirmation de mot de passe'));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('OK'), array('class' => 'btn btn-success btn-lg')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class='col-sm-6 col-xs-4'>
                        <?php echo $this->Html->image('infoman.png', array('class' => 'img-responsive')) ?>
                </div>
        </div>
</div>
