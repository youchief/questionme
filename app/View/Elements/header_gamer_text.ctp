<div class="menu-wrap">
        <nav class="menu-top">
                <?php echo $this->Html->image('logo_2x.png', array('width' => '200px', 'id' => 'logo')) ?>
                <?php echo $this->Html->link('Accueil', array('controller' => 'pages', 'action' => 'display', 'home'), array('class' => '')); ?>
                <a href="#about">Concept</a>
                <a href="#contact">Contact</a>
        </nav>
        <nav class="menu-side">
                
                <?php echo $this->Html->link(__('Play'), array('controller' => 'questions', 'action' => 'play', 'admin' => false)); ?>
                <?php echo $this->Html->link(__('My Vouchers'), array('controller' => 'vouchers', 'action' => 'my_vouchers', 'admin' => false)); ?>
                <?php echo $this->Html->link(__('My Profile'), array('controller' => 'users', 'action' => 'my_profile', 'admin' => false)); ?>
                <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?>
        </nav>
</div>
<button class="menu-button" id="open-button">Open Menu</button>