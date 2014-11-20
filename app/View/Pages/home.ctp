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
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 align-center">
                            <p class="light green" style="font-weight:200;">Réponds aux questions<br/>Gagne des cadeaux</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="hidden-xs go-play-d">        
            <?php echo $this->Html->image('right.svg', array('width' => '29px')); ?>
        </div>
        <div class="go-play-m hidden-sm hidden-md  hidden-lg">        
            <?php echo $this->Html->image('down.svg', array('height' => '40px')); ?>
        </div>
        
    </div>
    <div id="home-play" class="home-play">
        
           
        <div class="home-play-aside  hidden-xs">
            <div class="pad-box">
                <?php echo $this->Html->image('questionme_logo_final.svg', array('class' => 'img-responsive')); ?>
                <div class="home-play-aside-cont bottom-30">
             
                </div>
                <div class="bottom-30">
                    <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'play', 'admin' => false)) ?>"><h3 class="play-button align-center">Jouer</h3></a>
                </div>
                <div class="go-info bottom-30">        
                    <h5>Le concept</h5>
                    <p class="align-center" style="margin-top:20px;">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </p>
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
                    <h5>Le concept</h5>
                </div>
            </div>
        </div>
    </div>
    <div id="home-info" class="home-info back-color ">
        <div class="info-desktop hidden-xs">
            <div class="container  hidden-xs">
                <div class="row">
                   
                        <div class="col-sm-3 feature-box-container text-center">
                            <div class="feature-box wow fadeInDown">
                                    <div class="icon">
                                            <?php echo $this->Html->image('concept/concept-1.png' , array('style' => 'margin:0 auto;')); ?>
                                    </div><br/>
                                    <div class="description align-left">
                                        <h3 class="green">JOUE...</h3>
                                        <p>Réponds aux questions du jour. Elles sont de tous types : humour, opinion, culture générale, actu… </p>
                                        <p class="green"><i>1 question répondue, c’est 1 chance de plus de gagner ! </i></p>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-3 feature-box-container text-center">
                                <div class="feature-box wow fadeInDown" data-wow-delay="0.2s">
                                    <div class="icon">
                                            <?php echo $this->Html->image('concept/concept-2.png', array('style' => 'margin:0 auto;')); ?>
                                    </div><br/>
                                    <div class="description align-left">
                                          <h3 class="green">ET GAGNE!</h3>
                                          <h5>BON DE REDUCTION</h5>
                                          <p>Dès que tu as répondu aux questions du jour, tu gagnes automatiquement un bon de réduction !</p>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-3 feature-box-container text-center">
                                <div class="feature-box wow fadeInDown" data-wow-delay="0.4s">                                
                                    <div class="icon">
                                            <?php echo $this->Html->image('concept/concept-3.png', array('style' => 'margin:0 auto;')); ?>
                                    </div><br/>
                                    <div class="description align-left">
                                        <h3 class="green">GAGNE!!</h3>
                                        <h5>CADEAUX PAR TIRAGE AU SORT</h5>
                                        <p>A la fin de la journée, un tirage au sort détermine les gagnants pour le cadeau du jour.</p>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-3 feature-box-container text-center">
                                <div class="feature-box wow fadeInDown" data-wow-delay="0.4s"> 
                                    <div class="icon">
                                            <?php echo $this->Html->image('concept/concept-4.png', array('style' => 'margin:0 auto;')); ?>
                                    </div><br/>
                                    <div class="description align-left">
                                        <h3 class="green">GAGNE!!!</h3>
                                        <h5>ET C’EST PAS FINI ! </h5>
                                        <p>A la fin de la semaine, un tirage au sort détermine les gagnants pour <i class="green"> le cadeau de la semaine. </i></p>
                                    </div>
                                </div>
                        </div>
                        <div class="clear"></div>
                        <div class="col-sm-6 col-sm-offset-3 description">
                                <br/><br/>
                                <p class="light align-center">J'ai compris... Maintenant je veux</p>
                                <div class="align-center">
                                    <?php echo $this->Html->link('JOUER',array('controller' => 'questions', 'action' => 'play', 'admin' => false), array('class' => 'btn btn-success btn-lg')) ?>
                                </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="info-mobile hidden-lg hidden-md hidden-sm">


            <div id="info-1" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                            
                            <div class="row">
                                <div class="icon col-xs-8 col-xs-offset-2">
                                        <?php echo $this->Html->image('concept/concept-1.png' , array('class' => 'img-responsive', 'style' => 'margin:0 auto;')); ?>
                                </div>
                            </div>    
                            <br/>
                            <div class="description align-left">
                                <h3 class="green">JOUE...</h3>
                                <p>Réponds aux questions du jour. Elles sont de tous types : humour, opinion, culture générale, actu… </p>
                                <p class="green"><i>1 question répondue, c’est 1 chance de plus de gagner ! </i></p>
                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="active"></li>
                                <li class="info-2"></li>
                                <li class="info-3"></li>
                                <li class="info-4"></li>
                                <li class="info-5"></li>
                            </ol>
                    </div>
                </div>

            </div>
            <div id="info-2" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                        
                            <div class="row">
                                <div class="icon col-xs-8 col-xs-offset-2">
                                        <?php echo $this->Html->image('concept/concept-2.png' , array('class' => 'img-responsive', 'style' => 'margin:0 auto;')); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="description align-left">
                                  <h3 class="green">ET GAGNE!</h3>
                                  <h5>BON DE REDUCTION</h5>
                                  <p>Dès que tu as répondu aux questions du jour, tu gagnes automatiquement un bon de réduction !</p>
                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="info-1"></li>
                                <li class="active"></li>
                                <li class="info-3"></li>
                                <li class="info-4"></li>
                                <li class="info-5"></li>
                            </ol>
                    </div>
                </div>
            </div>
            <div id="info-3" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                        
                            <div class="row">
                                <div class="icon col-xs-8 col-xs-offset-2">
                                        <?php echo $this->Html->image('concept/concept-3.png' , array('class' => 'img-responsive', 'style' => 'margin:0 auto;')); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="description align-left">
                                <h3 class="green">GAGNE!!</h3>
                                <h5>CADEAUX PAR TIRAGE AU SORT</h5>
                                <p>A la fin de la journée, un tirage au sort détermine les gagnants pour le cadeau du jour.</p>
                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="info-1"></li>
                                <li class="info-2"></li>
                                <li class="active"></li>
                                <li class="info-4"></li>
                                <li class="info-5"></li>
                            </ol>
                    </div>
                </div>
            </div>
            <div id="info-4" class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">
                        
                            <div class="row">
                                <div class="icon col-xs-8 col-xs-offset-2">
                                        <?php echo $this->Html->image('concept/concept-4.png' , array('class' => 'img-responsive', 'style' => 'margin:0 auto;')); ?>
                                </div>
                            </div>
                            <br/>
                            <div class="description align-left">
                                <h3 class="green">GAGNE!!!</h3>
                                <h5>ET C’EST PAS FINI ! </h5>
                                <p>A la fin de la semaine, un tirage au sort détermine les gagnants pour <i class="green"> le cadeau de la semaine. </i></p>
                            </div>
                            <ol class="carousel-indicators-2">
                                <li class="info-1"></li>
                                <li class="info-2"></li>
                                <li class="info-3"></li>
                                <li class="active"></li>
                                <li class="info-5"></li>
                            </ol>
                    </div>
                </div>
            </div>
            <div id="info-5"  class="info-i">
                <div class="feature-box wow fadeInDown">
                    <div class="box-cont">

                        <div class="description">
                        <br/><br/>
                        <p class="light align-center">J'ai compris... Maintenant je veux</p>
                        <div class="align-center">
                            <?php echo $this->Html->link('JOUER',array('controller' => 'questions', 'action' => 'play', 'admin' => false), array('class' => 'btn btn-success btn-lg')) ?>
                        </div>
                        </div><br/>
                        <ol class="carousel-indicators-2">
                            <li class="info-1"></li>
                            <li class="info-2"></li>
                            <li class="info-3"></li>
                            <li class="info-4"></li>
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
</div>
