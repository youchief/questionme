<!DOCTYPE html>
<html lang="en" class="no-js">
        <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
                <meta name="viewport" content="width=device-width, initial-scale=1"> 
                <title>Fullscreen Form Interface</title>
                <meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
                <meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
                <meta name="author" content="Codrops" />
                <link rel="shortcut icon" href="../favicon.ico">

                <?php echo $this->Html->css(array('normalize', 'demo', 'component', 'cs-select', 'cs-skin-boxes'))?>
                
                <?php echo $this->Html->script('modernizr.custom')?>
        </head>
        <body>
                <div class="container">

                        <div class="fs-form-wrap" id="fs-form-wrap">
                                <div class="fs-title">
                                        <h1>QuestionMe - Play</h1>
                                        <div class="codrops-top">
                                                <?php echo $this->Html->link(__('Exit'), array('controller'=>'pages', 'action'=>'display', 'home'))?>
                                        </div>
                                </div>
                                <?php
                                
                                echo $this->fetch('content');
                                echo $this->Session->flash();
                                echo $this->Session->flash('auth');
                                ?>
                        </div><!-- /fs-form-wrap -->

                      

                </div><!-- /container -->
                
                <?php echo $this->Html->script(array('classie', 'selectFx', 'fullscreenForm'))?>
                
                <script>
                        (function () {
                                var formWrap = document.getElementById('fs-form-wrap');

                                [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
                                        new SelectFx(el, {
                                                stickyPlaceholder: false,
                                                onChange: function (val) {
                                                        document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                                                }
                                        });
                                });
                                
                                
                                
                                new FForm(formWrap, {
                                        onReview: function () {
                                                classie.add(document.body, 'overview'); // for demo purposes only
                                        }
                                });
                                
                        })();
                </script>
        </body>
</html>