<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="description" content="">
        <meta name="keywords" content="">
        
        <meta name="viewport" content="width=device-width">
        
        <meta name="og:title" content="">
        <meta name="og:description" content="">
        <meta name="og:image" content="">
        
        <?php echo $this->fetch('meta'); ?>
        
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array(
            'vendor/twitter/bootstrap.min',
            'vendor/fontawesome/font-awesome.min',
            'vendor/3xw/fonts-path-fix',
            'vendor/3xw/cake',
            'vendor/3xw/helpers',
            'admin-theme'
        ));

        echo $this->fetch('css');
        ?>
        
        <!--[if lt IE 8]>
        <?php echo $this->Html->css('vendor/coliff/bootstrap-ie7'); ?>
        <![endif]-->
    </head>
    <body>
        <div id="container" >
            
            <!--[if lt IE 8]>
                <div class="container">
                    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                </div>
            <![endif]-->
            
            <?php echo $this->element($header); ?>
            
            <div id="content" class="container">
                <?php
                echo $this->Session->flash(); 
                echo $this->Session->flash('auth');
                echo $this->fetch('content');
                echo $this->element('sql_dump');
                ?>
            </div>
            
            <?php echo $this->element('footer'); ?>
            
        </div>
        
        <?php
        echo $this->Html->script(array(
            'vendor/jquery/jquery.min',
            'vendor/twitter/bootstrap.min',
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