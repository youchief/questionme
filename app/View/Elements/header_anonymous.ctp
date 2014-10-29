<header>
        <nav>
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                                <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                        </button>

                                        <?php echo $this->Html->link($this->Html->image('logo.png', array('class' => 'img-responsive', 'id' => 'logo')), array('controller' => 'pages', 'action' => 'display', 'home'), array('class' => 'navbar-brand', 'escape' => false)); ?>
                                </div>
                                <nav>
                                        <div class="navbar-collapse collapse">
                                                <ul class="nav navbar-nav navbar-right">

                                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register', 'admin' => false)) ?>"><i class='fa fa-pencil'> S'inscrire</i></a></li>
                                                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login', 'admin' => false)) ?>"><i class='fa fa-lock'> Connexion</i></a></li>
                                                </ul>    
                                        </div>
                                </nav>
                        </div>

                </div>
        </nav>

</header>