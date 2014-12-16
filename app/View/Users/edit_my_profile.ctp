<div class="container form">
        <div class="row">
                <div class="col-sm-6 col-xs-8">
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>
                                <h2><?php echo __('Editer mon profil'); ?></h2>
                                <?php
                                echo $this->Form->input('id', array('class' => 'form-control'));
                                echo $this->Form->input('username', array('class' => 'form-control', 'type' => 'hidden', 'label' => 'Pseudo'));
                                echo $this->Form->input('birthday', array('class' => 'form-control', 'label' => 'Date de naissance', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                                echo $this->Form->input('sex', array('class' => 'form-control', 'label' => 'Sexe', 'type' => 'select', 'empty' => true, 'options' => array('male' => 'Homme', 'female' => 'Femme')));
                                //echo $this->Form->input('email', array('class' => 'form-control', 'class'=>'disable'));
                                echo $this->Form->input('newsletter', array('class' => 'checkbox', 'label' => 'Tiens-moi au courant des cadeaux'));
                                echo $this->Form->input('region_id', array('class' => 'form-control'));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('OK'), array('class' => 'btn btn-success btn-lg')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class='col-sm-6 col-xs-4 '>
                        <?php echo $this->Html->image('pikman.png', array('class' => 'img-responsive')) ?>
                </div>
        </div>
</div>
