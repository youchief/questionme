<div class="navbar-wrapper">
        <div class="container">

                <div class="navbar navbar-default navbar-static-top" role="navigation">
                        <div class="container">
                                <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                        </button>
                                        <?php echo $this->Html->link('Question Me', array('controller' => 'pages', 'action' => 'display', 'home'), array('class'=>'navbar-brand')); ?>
                                </div>
                                <div class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav">
                                                <li><a href="#about">Concept</a></li>
                                                <li><a href="#contact">Contact</a></li>
                                                
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                                <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register', 'admin' => false)); ?></li>
                                                <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login', 'admin' => false)); ?></li>
                                        </ul>    
                                </div>
                        </div>
                </div>

        </div>
</div>