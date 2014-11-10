<header>
        <nav>
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                       
                                <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                        </button>

                                        <?php echo $this->Html->link($this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive', 'id' => 'logo')), array('controller' => 'pages', 'action' => 'display', 'home'), array('class' => 'navbar-brand hidden-sm hidden-md hidden-lg', 'escape' => false)); ?>
                                </div>
<<<<<<< HEAD
                                <div class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav navbar-right">
=======
                                <nav>
                                        <div class="navbar-collapse collapse">
                                                <ul class="nav navbar-nav navbar-right">

>>>>>>> FETCH_HEAD
                                                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><i class='fa fa-play-circle'> PLAY</i></a></li>
                                                <li><a href="<?php echo $this->Html->url(array('controller' => 'vouchers', 'action' => 'my_vouchers', 'admin' => false)) ?>"><i class='fa fa-trophy'> Mes Bons</i></a></li>
                                                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'my_profile', 'admin' => false)) ?>"><i class='fa fa-user'> Mon profil</i></a></li>
                                                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'admin' => false)) ?>"><i class='fa fa-unlock'> Déconnexion</i></a></li>

                                                
                                        </ul>    
                                        
                                        <p class="navbar-text">Hello <?php echo $username?></p>
                                </div>
                        </div>
                
        </nav>
</header>