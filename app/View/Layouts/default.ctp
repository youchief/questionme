<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="1.Connecte-toi 2.Réponds aux 15 questions du jour 3.Gagne des cadeaux et des bons de réduction !">
                <meta name="author" content="3xW - web and mobile solutions">
                <title>Question Me - GAGNE des CADEAUX et des BONS DE REDUCTION tous les jours !</title>
                <meta name="author" content="3xW - web and mobile solutions">
                <link href='http://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
                <?php echo $this->Html->css(array('vendor/twitter/bootstrap.min', 'vendor/3xw/fonts-path-fix', 'vendor/fontawesome/font-awesome', 'vendor/3xw/cake', 'vendor/jquery.carousel.fullscreen',  'menu', 'default')) ?>
                <!-- Favicon -->
                <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
                <link rel="icon" href="favicon.ico" type="image/x-icon">

                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                        <script src="js/html5shiv.js"></script>
                        <script src="js/respond.min.js"></script>
                <![endif]-->
        </head>


        <body>
                <!-- NAVBAR -->
                
                <div class="content-wrap">
                     <?php echo $this->element($header) ?>
                        
                        <div class="container">
                                <?php
                                echo $this->Session->flash();
                                echo $this->Session->flash('default', 'auth', array());
                                ?>
                        </div>
                        <?php
                        echo $this->fetch('content');
                        ?>
                    <div class="push"></div>
                     
                </div>
                <?php echo $this->element('footer'); ?>
                
                <?php
                echo $this->Html->script(array(
                    'vendor/jquery/jquery.min',
                    'vendor/twitter/bootstrap.min',
                    'vendor/jquery/jquery.carousel.fullscreen',
                    'vendor/jquery/jquery.touchSwipe.min',
                    'classie',                  
                    'app'
                ));
                ?>

                <!--[if lt IE 10]>
                <?php echo $this->Html->script('vendor/3xw/ie-lt-10'); ?>
                <![endif]-->
                <!--[if lt IE 9]>
                <?php echo $this->Html->script('vendor/boilerplate/html5-3.6-respond-1.1.0.min'); ?>
                <![endif]-->
                <!--[if lt IE 8]>
                <?php echo $this->Html->script('vendor/3xw/ie-lt-8'); ?>
                <![endif]-->
                <?php echo $this->fetch('script'); ?>
        </body>
        
</html>