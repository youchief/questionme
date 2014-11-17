<header>
        
        <nav>
                    
                    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="header-user hidden-xs">
                            <p class="navbar-text light white" style="color:#44494f;">.</p>   
                        </div>

                                       

                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                            
                            <h5 class="align-right menu-txt hidden-xs hidden-sm" >MENU</h5>

                                <?php echo $this->Html->link($this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive', 'id' => 'logo')), '/#home-play', array('class' => 'navbar-brand ', 'escape' => false)); ?>
                        </div>

                        <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                                        <li><a href="<?php echo $this->Html->url('/#home-play') ?>"><i class='fa fa-home'> </i> Home</a></li>
                                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register', 'admin' => false)) ?>"><i class='fa fa-pencil'> </i> S'inscrire</a></li>
                                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login', 'admin' => false)) ?>"><i class='fa fa-lock'> </i> Connexion</a></li>
                                                   
                                            </ul>    
                        </div>
                </div>

        </nav>
</header>