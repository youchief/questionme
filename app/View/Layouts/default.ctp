<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="1.Connecte-toi 2.Réponds aux 15 questions du jour 3.Gagne des cadeaux et des bons de réduction !">
                <meta name="author" content="3xW - web and mobile solutions">
                <title>Question Me - GAGNE des CADEAUX et des BONS DE REDUCTION tous les jours !</title>
                <?php echo $this->Html->css(array('vendor/twitter/bootstrap.min', 'vendor/3xw/fonts-path-fix', 'vendor/fontawesome/font-awesome.min', 'ladda-themeless.min', 'animate.min', 'app')) ?>
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
                <!-- Preloader -->
                <div class="container">
                        <?php
                        echo $this->Session->flash('auth');
                        echo $this->Session->flash();
                        ?>



                </div>
                <?php
                echo $this->fetch('content');
                ?>

                <?php echo $this->Html->script(array('vendor/jquery/jquery.min', 'vendor/twitter/bootstrap.min', 'vendor/jquery/jquery.backstretch.min', 'spin.min', 'ladda.min', 'retina.min', 'wow.min', 'init')) ?>
                <script>
                        (function (i, s, o, g, r, a, m) {
                                i['GoogleAnalyticsObject'] = r;
                                i[r] = i[r] || function () {
                                        (i[r].q = i[r].q || []).push(arguments)
                                }, i[r].l = 1 * new Date();
                                a = s.createElement(o),
                                        m = s.getElementsByTagName(o)[0];
                                a.async = 1;
                                a.src = g;
                                m.parentNode.insertBefore(a, m)
                        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                        ga('create', 'UA-44952673-20', 'auto');
                        ga('send', 'pageview');

                </script>

        </body>
</html>
