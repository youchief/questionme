<div class='container'>
        <div class="row">
                <div class="col-sm-6">
                        <h1>S'inscrire</h1>
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>
                                <?php
                                echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Pseudo'));
                                echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Mot de passe'));
                                echo $this->Form->input('birthday', array('class' => 'form-control', 'label' => 'Date de naissance', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                                echo $this->Form->input('sex', array('class' => 'form-control', 'label' => 'Sexe', 'type' => 'select', 'empty' => true, 'options' => array('male' => 'Homme', 'female' => 'Femme')));
                                echo '<br>';
                                echo $this->Form->input('email', array('class' => 'form-control',));
                                echo $this->Form->input('region_id', array('class' => 'form-control', 'label' => 'Région pour laquelle je veux jouer'));
                                echo $this->Form->input('newsletter', array('type' => 'hidden', 'class' => 'checkbox', 'label' => 'Je m\'inscris à la Newsletter', 'default' => true));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('GO !'), array('class' => 'btn btn-success btn-lg')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class='col-sm-6'>
                        <?php echo $this->Html->image('pikman.png', array('class'=>'img-responsive'))?>
                </div>
        </div>
</div>