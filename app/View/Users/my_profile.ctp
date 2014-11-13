<div class='container'>
        <div class="row">
                <div class='col-sm-6 col-xs-8'>
                        <h3><?php echo h($user['User']['username']); ?></h3>
                        <p class="light">
                                <?php echo $this->Time->format('d-m-y', $user['User']['birthday']); ?>
                        </p>
                        <p class="light">
                                <?php echo h($user['User']['email']); ?>
                        </p>
                        <p class="light">
                                <?php echo h($user['Region']['name']); ?>
                        </p>
                        <br/>


                        <?php echo $this->Html->link(__('Editer mon compte'), array('controller' => 'users', 'action' => 'edit_my_profile'), array('class' => 'btn btn-success')) ?><br/><br/>
                        <?php echo $this->Html->link(__('Changer mon mot de passe'), array('controller' => 'users', 'action' => 'change_password'), array('class' => 'btn btn-success')) ?>
                        <br/><br/>


                </div>
                <div class='col-sm-6 col-xs-4 light'>
                        <?php echo $this->Html->image('pikman.png', array('class' => 'img-responsive')) ?>
                </div>
        </div>
</div>
