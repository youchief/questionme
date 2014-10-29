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
                                echo $this->Form->input('username', array('class' => 'form-control', 'label'=>'Pseudo'));
                                echo $this->Form->input('password', array('class' => 'form-control', 'label'=>'Mot de passe', 'after' => $this->Html->link(__('Mot de passe oublié?'), array('controller' => 'users', 'action' => 'recover'))));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('GO !'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class="col-sm-6">
                         <?php //echo $this->Facebook->login(); ?>
                        
                       <?php //echo $this->Facebook->logout(array('redirect' => array('controller' => 'users', 'action' => 'logout'), 'img' => '/Facebook/img/facebook-logout.png')); ?>

                </div>
        </div>

        <br>
       


</div>
