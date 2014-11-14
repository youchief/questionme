<div class='container'>
        <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                        <h1>Connexion</h1>
                        <?php echo $this->Form->create('User', array('action' => 'login')); ?>
                        <fieldset>

                                <?php
                                echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Pseudo'));
                                echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Mot de passe', 'after' => $this->Html->link(__('Mot de passe oublié?'), array('controller' => 'users', 'action' => 'recover'))));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Html->link(__('Pas encore inscrit ? Clique ici !'), array('controller' => 'users', 'action' => 'register'))?>
                        <br>
                        <br>
                        <?php echo $this->Form->submit(__('GO !'), array('class' => 'btn btn-success btn-lg')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                
        </div>
</div>
