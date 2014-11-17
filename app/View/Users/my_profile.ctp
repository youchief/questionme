<div class='container'>
        <div class="row">
                <div class='col-sm-6 col-xs-8'>
                        <h3><?php echo h($user['User']['username']); ?></h3>
                        <p class="light">                                
                                <?php echo date_diff(date_create($user['User']['birthday']), date_create('today'))->y." ans";?>
                        </p>
                        <p class="light">
                                <?php echo h($user['User']['email']); ?>
                        </p>
                        <p class="light">
                                <?php echo h($user['Region']['name']); ?>
                        </p>
                        <br/>

                        <?php echo $this->Html->link(__('Mes bons'), array('controller' => 'vouchers', 'action' => 'my_vouchers'), array('class' => 'btn btn-success btn-lg')) ?><br/><br/>
                        <?php echo $this->Html->link(__('Editer mon compte'), array('controller' => 'users', 'action' => 'edit_my_profile'), array('class' => 'btn btn-success btn-lg')) ?><br/><br/>
                        <?php echo $this->Html->link(__('Changer mot de passe'), array('controller' => 'users', 'action' => 'change_password'), array('class' => 'btn btn-success btn-lg')) ?>
                        <br/><br/>


                </div>
                <div class='col-sm-6 col-xs-4 light'>
                        <?php echo $this->Html->image('pikman.png', array('class' => 'img-responsive')) ?>
                </div>
        </div>
</div>
