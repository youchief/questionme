<section class="main text-center" id="home">
        <div class="page">
                <div class="wrapper">
                        <div class="container">
                                <?php echo $this->Html->image('logo_2x.png', array('width' => '400px', 'id' => 'logo')) ?>
                                <h1 class="heading">ON ARRIVE BIENTÔT !</h1>
                                <p>
                                        Avec QuestionMe, GAGNE des CADEAUX et des BONS DE REDUCTION tous les jours !

                                </p>
                               
                                <!-- Subscription form -->
                                <form name="inscriptionMailPro" action="http://form-ins.mailpro.com//extSubNewsletter_Guid.asp?lang=fr" method="post" class="form-inline signup">
                                        <div class="form-group">
                                                <input type="email" name="awEmail" class="form-control" placeholder="Email">
                                                <input name="awRetourOk" type="hidden" value="http://questionme.ch/" />
                                                <input name="awRetourErr" type="hidden" value="http://questionme.ch/" />
                                                <input name="awCarnet" type="hidden" value="a3112601-c783-4c55-ade6-df3da02131e6" />
                                        </div>
                                        <div class="form-group">
                                                <button type="submit" class="btn btn-theme ladda-button" data-style="expand-left"><span class="ladda-label">Tiens-moi au jus !</span></button>
                                        </div>
                                </form>
                                <footer class="text-center">
                                        <div class="social">
                                                <a href="https://www.facebook.com/QuestionmeQME?fref=ts" class="btn btn-theme"><i class="fa fa-facebook"></i></a>
                                                <a href="https://twitter.com/QuestionmeQME" class="btn btn-theme"><i class="fa fa-twitter"></i></a>
                                                <a href="http://instagram.com/questionmeqme" class="btn btn-theme"><i class="fa fa-instagram"></i></a>
                                        </div>
                                </footer>
                        </div>
                        <div class="arrow-down">
                                <a class="scroll" href="#about" id="scroll"><i class="fa fa-angle-double-down"></i></a>
                        </div>
                </div>
        </div>
</section>

<!-- About -->
<section id="about" class="section">
        <div class="container">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="section-title">LE CONCEPT</h3>
                                <div class="section-title-border"></div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                                <p class="lead">
                                        Avec QuestionMe, GAGNE des CADEAUX et des BONS DE REDUCTION tous les jours !
                                </p>
                                <p>
                                        Comment ça marche ? 
                                </p>
                                <div class="row">
                                        <div class="col-sm-4 feature-box-container">
                                                <div class="feature-box wow fadeInDown">
                                                        <div class="icon">
                                                                <i class="fa fa-lock"></i>
                                                        </div>
                                                        <div class="description">
                                                                <h4>Connecte-toi sur <br> www.questionme.ch</h4>

                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4 feature-box-container">
                                                <div class="feature-box wow fadeInDown" data-wow-delay="0.2s">
                                                        <div class="icon">
                                                                <i class="fa fa-question"></i> 
                                                        </div>
                                                        <div class="description">
                                                                <h4>Réponds aux 15 questions du jour</h4>

                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4 feature-box-container">
                                                <div class="feature-box wow fadeInDown" data-wow-delay="0.4s">
                                                        <div class="icon">
                                                                <i class="fa fa-gift"></i>
                                                        </div>
                                                        <div class="description">
                                                                <h4>Gagne des cadeaux et des bons de réduction !</h4>

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
<section class="section">
        <div class="container">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="section-title">En image</h3>
                                <div class="section-title-border"></div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                                <iframe src="//player.vimeo.com/video/106661455" width="100%" height="481" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                </div>
        </div>
</section>

<!-- Contact -->
<section id="contact" class="section">
        <div class="container">
                <div class="row">
                        <div class="col-sm-12">
                                <h3 class="section-title">Contact</h3>
                                <div class="section-title-border"></div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <p>
                                        <strong>Gagne des cadeaux et des bons de réduction !</strong>
                                </p>
                                <ul class="list-contacts">

                                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:hello@questionme.ch">hello@questionme.ch</a></li>
                                </ul>
                        </div>
                        <div class="col-sm-6" id="contact">
                                <?php echo $this->Form->create('Contact', array('action' => 'sendmail', 'id' => "")) ?>
                                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => "Nom", 'label' => false)); ?>
                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => "Email", 'label' => false)); ?>
                                <?php echo $this->Form->input('message', array('class' => 'form-control', 'type' => 'textarea', 'placeholder' => "Message", 'label' => false)); ?>
                                <?php echo $this->Form->submit('Yeah!', array('class' => 'btn btn-default')); ?>
                                <?php echo $this->Form->end(); ?>
                        </div>
                </div>
        </div>
</section>