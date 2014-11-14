<div class='container'>
        <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                        <h1><?php echo __('Récupère ton mot de passe')?></h1>
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>

                                <?php
                                echo $this->Form->input('email', array('class' => 'form-control'));
                               
                                ?>
                        </fieldset>
                        <br/>
                        <?php echo $this->Form->submit(__('OK'), array('class' => 'btn btn-success btn-lg')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
</div>