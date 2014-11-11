<div class='container'>
    <div class="row">
        <div class='col-sm-6'>
                <h3><?php echo h($user['User']['username']); ?></h3><br/>
                <p class="light">
                        <?php echo $this->Time->format('d-m-y', $user['User']['birthday']); ?>
                        
                        <?php echo $this->Time->timeAgoInWords($user['User']['birthday']);?>
                </p>
                <p class="light">
                        <?php echo h($user['User']['email']); ?>
                </p>
                <p class="light">
                        <?php echo h($user['Region']['name']);?>
                </p>
                <br/>
               
               
                         <?php echo $this->Html->link(__('Editer mon compte'), array('controller'=>'users', 'action'=>'edit_my_profile'), array('class'=>'btn btn-success'))?><br/><br/>
                        <?php echo $this->Html->link(__('Changer mon mot de passe'), array('controller'=>'users', 'action'=>'change_password'), array('class'=>'btn btn-success'))?>
                <br/><br/>
                       
                
        </div>
        <div class='col-sm-6 light'>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus, metus vitae porttitor iaculis, augue est ornare massa, pharetra blandit mi tellus et velit. Donec vitae dictum purus. Aliquam erat volutpat. Maecenas eget feugiat nunc. Etiam ac interdum leo. Nullam lacinia sapien consectetur dolor pellentesque, et mollis ante scelerisque. Nunc arcu nisi, venenatis eget tellus a, tristique imperdiet neque. Vivamus a sagittis risus. Etiam sit amet felis eu nunc lacinia bibendum. Proin luctus orci eu dolor vestibulum mattis. Pellentesque scelerisque facilisis mauris at interdum. Aenean ac ipsum a lectus rhoncus aliquam ac non lorem. Integer risus est, tempor vel quam sit amet, tempor tincidunt sem.</p>
        </div>
    </div>
</div>
