<div class='container'>
        <div class="row">
                <div class="col-sm-12">
                        <h1>Register</h1>
                        <hr>
                        <?php echo $this->Form->create('User'); ?>
                        <fieldset>

                                <?php
                                echo $this->Form->input('username', array('class' => 'form-control'));
                                echo $this->Form->input('password', array('class' => 'form-control'));
                                echo $this->Form->input('birthday', array('class' => 'form-control', 'dateFormat' => 'DMY', 'empty' => true, 'minYear' => date('Y') - 80, 'maxYear' => date('Y') - 18));
                                echo $this->Form->input('gender', array('class' => 'form-control', 'type' => 'select', 'empty' => true, 'options'=>array('Male'=>'Male', 'Female'=>'Female')));
                                echo $this->Form->input('email', array('class' => 'form-control'));
                                echo $this->Form->input('region_id', array('class' => 'form-control'));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
        </div>
</div>