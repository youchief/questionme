<div class='container'>
        <div class="row">
                <div class="col-sm-12">
                        <h1><?php echo __('Recover username/password')?></h1>
                        <hr>
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>

                                <?php
                                echo $this->Form->input('email', array('class' => 'form-control'));
                               
                                ?>
                        </fieldset>
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
</div>