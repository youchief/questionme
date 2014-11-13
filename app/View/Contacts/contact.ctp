<div class='container'>
        <div class="row">
                <div class="col-sm-6">
                        <h1>Contact</h1>
                        <?php echo $this->Form->create('Contact'); ?>
                        <fieldset>
                                <?php
                                echo $this->Form->input('name', array('class' => 'form-control', 'label'=>'Ton nom'));
                                echo $this->Form->input('email', array('class' => 'form-control', 'label'=>'Ton e-eamil'));
                                echo $this->Form->input('message', array('class' => 'form-control', 'label'=>'Et enfin ton ptit message'));
                                ?>
                        </fieldset>
                        <br>
                        <?php echo $this->Form->submit(__('Envoyer'), array('class' => 'btn btn-success')); ?>
                        <?php echo $this->Form->end(); ?>
                </div>
                <div class="col-sm-6 bloquote">

                        <p class='lead'>
                                Tu as une idée, une recommandation, une plainte ?
                        <br><br>
                                Tu veux nous écrire des mots doux ou peut-être travailler avec nous ? 
                       <br><br>
                                On te répondra au plus vite ! 

                        </p>


                </div>
        </div>
</div>