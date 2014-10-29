<div class='container'>
        <div class="row">
                <div class="col-sm-12">
                        <h1>S'inscrire</h1>
                        <hr>
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>

                                <?php
                                echo $this->Form->input('username', array('class' => 'form-control', 'label'=>'Pseudo'));
                                echo $this->Form->input('password', array('class' => 'form-control', 'label'=>'Mot de passe'));
                                echo $this->Form->input('birthday', array('class' => 'form-control','label'=>'Date de naissance', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                                echo $this->Form->input('gender', array('class' => 'form-control','label'=>'H/F', 'type' => 'select', 'empty' => true, 'options'=>array('Male'=>'Homme', 'Female'=>'Femme')));
                                echo $this->Form->input('email', array('class' => 'form-control'));
                                echo $this->Form->input('region_id', array('class' => 'form-control','label'=>'Région'));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('GO !'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
</div>