<div class='container'>
        <div class="row">
                <div class="col-sm-12">
                        <h1>Connexion</h1>
                </div>
        </div>
        <div class="row">
                <div class="col-sm-6">
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>

                                <?php
                                echo $this->Form->input('username', array('class' => 'form-control'));
                                echo $this->Form->input('password', array('class' => 'form-control', 'after' => $this->Html->link(__('forgot password'), array('controller' => 'users', 'action' => 'recover'))));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class="col-sm-6">
                         <?php echo $this->Facebook->login(); ?>
                        
                        <?php echo $this->Facebook->logout(array('redirect' => array('controller' => 'users', 'action' => 'logout'), 'img' => '/Facebook/img/facebook-logout.png')); ?>

                </div>
        </div>

        <br>
       


</div>
