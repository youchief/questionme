<?php $this->layout = 'home'; ?>
<?php echo $this->Html->css(array('home')); ?>
<div class="home-layer back-color">
    <div id="home-prince" class="home-prince ">
        <div  class="home-prince-block">
            <div class="home-prince-block-title">
                <?php echo $this->Html->link($this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive')), '#home-infos', array( 'escape' => false)); ?>
            </div>
            <div class="home-prince-block-infos">
                <div class="container marketing">
                    <!-- Three columns of text below the carousel -->
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-4 col-md-offset-5 col-sm-offset-4 col-xs-offset-4 align-center">
                            <p><?php echo $this->Html->link($this->Html->image('home-gift.svg', array('height' => '60px', 'class' => 'img-responsive')), '#home-infos', array( 'escape' => false)); ?></p>
                            
                        </div>
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 align-center">
                            <p class="light green">Réponds aux questions<br/>et gagne des cadeaux</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="hidden-xs go-play-d">        
            <?php echo $this->Html->image('right.svg', array('width' => '29px')); ?>
        </div>
        <div class="go-play-m hidden-sm hidden-md  hidden-lg">        
            <?php echo $this->Html->image('down.svg', array('height' => '29px')); ?>
        </div>
        
    </div>
    <div id="home-play" class="home-play">
        
           
        <div class="home-play-aside  hidden-xs">
            <div class="pad-box">
                <?php echo $this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive')); ?>
                <div class="home-play-aside-cont bottom-30">
             
                </div>
                <p class="">
                    <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><h3 class="play-button align-center">Jouer</h3></a>
                </p>
                <div class="go-info bottom-50">        
                    <h5>Le principe</h5>
                </div>
            </div>
        </div>
        <div class="home-play-gallery">
            <?php echo $this->element('carousel_home') ?>
        </div>
        <div class="home-play-aside hidden-lg hidden-md hidden-sm">
            <div class="pad-box">
                <div class="home-play-aside-cont">

                </div>
                <p class="">
                    <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><h3 class="play-button align-center">Jouer</h3></a>
                </p>
                <div class="go-info bottom-30">        
                    <h5>Le principe</h5>
                </div>
            </div>
        </div>
    </div>
    <div id="home-info" class="home-info back-color ">
        <div class="info-desktop hidden-xs">
            <div class="container  hidden-xs">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-4 col-xs-offset-4 bottom-30">
                        <?php //echo $this->Html->link($this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive')), '#home-infos', array( 'escape' => false)); ?>
                    </div>
                        <div class="col-sm-2 col-sm-offset-3 feature-box-container text-center">
                            
                                <div class="feature-box wow fadeInDown">
                                    <h2 class="align-left yellow">1</h2>
                                        <div class="icon">
                                                <i class="fa fa-lock fa-5x"></i>
                                        </div><br/>
                                        <div class="description">
                                                <p class="light">Connecte-toi sur <br> www.questionme.ch</p>

                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-2 feature-box-container text-center">
                                <div class="feature-box wow fadeInDown" data-wow-delay="0.2s">
                                    <h2 class="align-left yellow">2</h2>
                                        <div class="icon">
                                                <?php echo $this->Html->image('qlog.svg', array('width' => '65px')); ?>
                                        </div><br/>
                                        <div class="description">
                                                <p class="light">Réponds aux 10 questions du jour</p>

                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-2 feature-box-container text-center">
                                <div class="feature-box wow fadeInDown" data-wow-delay="0.4s">
                                    <h2 class="align-left yellow">3</h2>
                                        <div class="icon">
                                                <?php echo $this->Html->image('clog.svg', array('width' => '60px')); ?>
                                        </div><br/>
                                        <div class="description">
                                            <p class="light">Gagne des cadeaux et des bons de réduction !</p>

                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3 description">
                                <br/><br/>
                                <h2 class="light align-center yellow">J'ai compris... Maintenant je veux</h2>
                                <p class="">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><h3 class="play-buttonG align-center">Jouer</h3></a>
                                </p>
                        </div>
                </div>
            </div>
        </div>
        <div class="info-mobile hidden-lg hidden-md hidden-sm">


            <div id="info-1" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                        <h3 class="align-left yellow">1</h3>
                            <div class="icon">
                                    <i class="fa fa-lock fa-5x "></i>
                            </div><br/>
                            <div class="description">
                                    <p class="light ">Connecte-toi sur <br> www.questionme.ch</p>

                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="active"></li>
                                <li class="info-2"></li>
                                <li class="info-3"></li>
                                <li class="info-4"></li>
                            </ol>
                    </div>
                </div>

            </div>
            <div id="info-2" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                        <h3 class="align-left yellow">2</h3>
                            <div class="icon">
                                    <?php echo $this->Html->image('qlog.svg', array('width' => '65px')); ?>
                            </div><br/>
                            <div class="description">
                                <p class="light ">Réponds aux <br/>10 questions du jour</p>

                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="info-1"></li>
                                <li class="active"></li>
                                <li class="info-3"></li>
                                <li class="info-4"></li>
                            </ol>
                    </div>
                </div>
            </div>
            <div id="info-3" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                        <h3 class="align-left yellow">3</h3>
                            <div class="icon">
                                    <?php echo $this->Html->image('clog.svg', array('width' => '60px')); ?>
                            </div><br/>
                            <div class="description">
                                    <p class="light ">Gagne des cadeaux et des bons de réduction !</p>

                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="info-1"></li>
                                <li class="info-2"></li>
                                <li class="active"></li>
                                <li class="info-4"></li>
                            </ol>
                    </div>
                </div>
            </div>
            <div id="info-4"  class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">

                        <div class="description">
                            <p class="light ">J'ai compris...<br> maintenant je veux</p></div>
                                <p class="">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><h3 class="play-button align-center">Jouer</h3></a>
                                </p>
                        </div>
                        <ol class="carousel-indicators-2">
                            <li class="info-1"></li>
                            <li class="info-2"></li>
                            <li class="info-3"></li>
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
</div>
