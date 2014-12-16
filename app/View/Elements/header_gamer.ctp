<header>
        
        <nav>
                    
                    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="header-user hidden-xs">
                            <p class="navbar-text light white connected">Hello <?php echo $this->Html->link($username, array('controller' => 'users', 'action' => 'my_profile'))?></p>   
                        </div>

                                       

                        <div class="navbar-header">
                                
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                            <h5 class="align-right menu-txt hidden-xs hidden-sm" >MENU</h5>

                            <div class="navbar-brand"><?php echo $this->Html->link($this->Html->image('questionme_logo_final.png', array('class' => 'img-responsive', 'id' => 'logo')), '/#home-play', array( 'escape' => false)); ?></div>
                        </div>

                        <div class="navbar-collapse collapse">
                            
                                <ul class="nav navbar-nav navbar-right">
                                        <li class="menu-home"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'display', 'home', "#"=>'home-play')) ?>"><i class='fa fa-home'> </i> Home</a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><i class='fa fa-play-circle'></i> JOUER</a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'vouchers', 'action' => 'my_vouchers', 'admin' => false)) ?>"><i class='fa fa-trophy'></i> Mes Bons</a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'my_profile', 'admin' => false)) ?>"><i class='fa fa-user'></i> Mon profil</a></li>
                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout', 'admin' => false)) ?>"><i class='fa fa-unlock'></i> Déconnexion</a></li>


                                </ul>    
                        </div>
                </div>

        </nav>
</header>