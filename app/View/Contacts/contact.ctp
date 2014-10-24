<div class='container'>
        <div class="row">
                <div class="col-sm-6">
                        <h1>Contact</h1>
                        <?php echo $this->Form->create('Contact'); ?>
                        <fieldset>
                                <?php
                                echo $this->Form->input('name', array('class' => 'form-control'));
                                echo $this->Form->input('email', array('class' => 'form-control'));
                                echo $this->Form->input('message', array('class' => 'form-control'));
                                ?>
                        </fieldset>
                        <hr>
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class="col-sm-6 bloquote">
                        <blockquote>
                        <p>
                                Tu as une idée, une recommandation, une plainte ?
                        </p>
                        <p>
                                Tu veux nous écrire des mots doux ou peut-être travailler avec nous ? 
                        </p>
                        <p>
                                On te répondra au plus vite ! 

                        </p>
                        </blockquote>

                </div>
        </div>
</div>