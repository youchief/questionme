<div class="menu-wrap">
        <nav class="menu-top">
                <?php echo $this->Html->image('logo_2x.png', array('width' => '200px', 'id' => 'logo')) ?>
                <?php echo $this->Html->link('Accueil', array('controller' => 'pages', 'action' => 'display', 'home'), array('class' => '')); ?>
                <a href="#about">Concept</a>
                <a href="#contact">Contact</a>
        </nav>
        <nav class="menu-side">
                <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register', 'admin' => false)); ?>
                <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?>
                <?php echo $this->Html->link('Play', array('controller' => 'questions', 'action' => 'play', 'admin' => false)); ?>
        </nav>
</div>
<button class="menu-button" id="open-button">Open Menu</button>