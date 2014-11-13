<header>
        
        <nav>
                    
                    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="header-user hidden-xs hidden-sm">
                            <p class="navbar-text light white">Hello <?php echo $this->Html->link($username, array('controller' => 'users', 'action' => 'my_profile'))?></p>   
                        </div>

                                       

                        <div class="navbar-header">
                                
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                            <p class="align-right menu-txt hidden-xs hidden-sm" >menu</p>

                                <?php echo $this->Html->link($this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive', 'id' => 'logo')), '/#home-play', array('class' => 'navbar-brand ', 'escape' => false)); ?>
                        </div>

                        <div class="navbar-collapse collapse">
                            
                                <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><i class='fa fa-play-circle'> PLAY</i></a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'vouchers', 'action' => 'my_vouchers', 'admin' => false)) ?>"><i class='fa fa-trophy'> Mes Bons</i></a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'my_profile', 'admin' => false)) ?>"><i class='fa fa-user'> Mon profil</i></a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'admin' => false)) ?>"><i class='fa fa-unlock'> Déconnexion</i></a></li>


                                </ul>    
                        </div>
                </div>

        </nav>
</header>