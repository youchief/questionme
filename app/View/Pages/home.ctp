<?php echo $this->element('carousel_home') ?>
<div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
                <div class="col-sm-4 feature-box-container text-center">
                        <div class="feature-box wow fadeInDown">
                                <div class="icon">
                                        <i class="fa fa-lock fa-5x"></i>
                                </div>
                                <div class="description">
                                        <h4>Connecte-toi sur <br> www.questionme.ch</h4>

                                </div>
                        </div>
                </div>
                <div class="col-sm-4 feature-box-container text-center">
                        <div class="feature-box wow fadeInDown" data-wow-delay="0.2s">
                                <div class="icon">
                                        <i class="fa fa-question fa-5x"></i> 
                                </div>
                                <div class="description">
                                        <h4>Réponds aux 15 questions du jour</h4>

                                </div>
                        </div>
                </div>
                <div class="col-sm-4 feature-box-container text-center">
                        <div class="feature-box wow fadeInDown" data-wow-delay="0.4s">
                                <div class="icon">
                                        <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="description">
                                        <h4>Gagne des cadeaux et des bons de réduction !</h4>
                                        
                                </div>
                        </div>
                </div>
        </div>


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
                <div class="col-md-7">
                        <h2 class="featurette-heading">Inscris-toi GRATUITEMENT  <span class="text-muted">sur QuestionMe.</span></h2>
                        <p class="lead">Dès que tu es inscrit, tu fais partie de QuestionMe ! </p>
                </div>
                <div class="col-md-5">                        
                        <?php echo $this->Html->image('man_playing.jpg', array('class' => 'featurette-image img-responsive')) ?>
                </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
                <div class="col-md-5">
                        <?php echo $this->Html->image('gifts.jpg', array('class' => 'featurette-image img-responsive')) ?>

                </div>
                <div class="col-md-7">
                        <h2 class="featurette-heading">Réponds aux questions du jour ! </h2>
                        <p class="lead">Eh oui, QuestionMe, c’est plein de questions ! On te propose de répondre à 15 questions par jour, sur le site internet. Les questions sont de tous types : Humour, Opinion, Culture générale, quizz, pub…
                                Fini les enquêtes ou les sondages de 20 à 40 minutes !</p>
                        <p class='lead'>QuestionMe, c’est moins de 5 minutes par jour
                                Il n’y a pas de vrai ou de faux. Chaque question répondue, c’est une chance de plus de gagner ! 
                        </p>
                </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
                <div class="col-md-7">
                        <h2 class="featurette-heading">Gagne des cadeaux<span class="text-muted"> et des bons de réduction !</span></h2>
                        <p class="lead">Dès que tu joues, tu augmentes tes chances de gagner le cadeau du jour et de la semaine. Une fois que tu as répondu aux questions du jour, tu participes  à un tirage au sort pour gagner le cadeau du jour. A la fin de la semaine, tu participes au tirage au sort pour gagner le cadeau de la semaine ! 
                        </p>       
                        <p class='lead'>
                                Mais c’est pas tout !
                                Dès que tu as joué, tu débloques automatiquement le bon de reduction du jour.
                        </p>

                </div>
                <div class="col-md-5">
                        <?php echo $this->Html->image('winner.jpg', array('class' => 'featurette-image img-responsive')) ?>
                </div>
        </div>

        <hr class="featurette-divider">
</div>

<!-- /END THE FEATURETTES -->