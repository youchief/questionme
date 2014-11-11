<div class="questions form">
        <?php echo $this->Form->create('Question',array('type' => 'file'))?>
        <fieldset>
                <legend><?php echo __('Admin Edit Question'); ?></legend>
                <?php
                echo $this->Form->input('id', array('class' => 'form-control'));
                echo $this->Form->input('question', array('class' => 'form-control'));
                echo $this->Form->input('profile', array('class'=>'checkbox'));
                echo $this->Form->input('date', array('class' => 'form-control'));
                echo $this->Form->input('media', array('class' => 'form-control', 'type' => 'file'));
                //echo $this->Form->input('media_type', array('class' => 'form-control'));
                echo $this->Form->input('response_type', array('class' => 'form-control', 'type' => 'select', 'options' => array('RADIO' => 'RADIO', 'CHECKBOX' => 'CHECKBOX', 'FREE' => 'FREE')));

                //echo $this->Form->input('dependance_choice_id', array('class' => 'form-control'));
                //echo $this->Form->input('priority', array('class' => 'form-control'));
                echo $this->Form->input('active', array('class' => 'checkbox'));
                                echo $this->Form->input('final_order_question', array('class' => 'checkbox'));

                echo $this->Form->input('question_type_id', array('class' => 'form-control'));
                echo $this->Form->input('order_id', array('class' => 'form-control'));
                echo "<hr>";
                echo "<legend>Conditons</legend>";
                echo $this->Form->input('to_age_start', array('class' => 'form-control', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                echo $this->Form->input('to_age_end', array('class' => 'form-control', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                echo $this->Form->input('to_gender', array('class' => 'form-control', 'label' => 'H/F', 'type' => 'select', 'empty' => true, 'options' => array('male' => 'Homme', 'female' => 'Femme')));
                echo $this->Form->input('Region', array('class' => 'form-control'));
                ?>
        </fieldset>
        <hr>
        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
        <?php echo $this->Form->end(); ?>
</div>
