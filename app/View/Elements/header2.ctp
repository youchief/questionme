<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo $this->Html->image('theme2/header_logo.png', array('height' => '23px')); ?></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><?php echo $this->Html->link(__('Jouer'), array(), array()); ?></li>
        <li><?php echo $this->Html->link(__('Concept'), array(), array()); ?></li>
        <li><?php echo $this->Html->link(__('Funfacts'), array(), array()); ?></li>
        <li><?php echo $this->Html->link(__('Historique des offres'), array(), array()); ?></li>
        <li><?php echo $this->Html->link(__('à propos'), array(), array()); ?></li>
        <li><?php echo $this->Html->link(__('Connexion'), array(), array('class' => 'header-login')); ?></li>
      </ul>
    </div>
  </div>
</nav>