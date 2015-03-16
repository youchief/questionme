<?php $this->layout = 'home2'; ?>
<?php 

    $banners = $this->requestAction(array('controller' => 'banners', 'action' => 'gethome')); 
    $voucher = $this->requestAction(array('controller' => 'vouchers', 'action' => 'getvoucher')); 
    
    $day = array();
    $week = array();
    
    foreach($banners as $banner){
        if($banner['BannerType']['id'] == 2){
            $day = $banner['Banner'];
        }else{
            $weekend = $banner['Banner'];
        }
    }
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-sm-5 col-md-4 col-lg-3 home__sidebar">
            <div class="home__sidebar-block">
                <p class="text-small text-italic"><?php echo __('lausanne et environ'); ?></p>
                <?php echo $this->Html->image('theme2/home_logo.png', array('class' => 'img-responsive')); ?>
                <h2><?php echo __('Le quiz qui te fait gagner des cadeau tous les jours'); ?></h2>
                <p><?php echo __('En répondant aux questions:'); ?></p>
                <ul class="home__sidebar-list">
                    <li>
                        <?php echo $this->Html->image('theme2/home_checkbox.png'); ?>
                        <div>
                            <p><?php echo __('tu obtiens directement un'); ?></p>
                            <h3><?php echo __('Bon de réduction'); ?></h3>
                        </div>
                    </li>
                    <li>
                        <?php echo $this->Html->image('theme2/home_checkbox.png'); ?>
                        <div>
                            <p><?php echo __('tu participes au tirage au sort pour'); ?></p>
                            <h3><?php echo __('Le cadeau du jour'); ?></h3>
                        </div>
                    </li>
                    <li>
                        <?php echo $this->Html->image('theme2/home_checkbox.png'); ?>
                        <div>
                            <p><?php echo __('tu participes au tirage au sort pour'); ?></p>
                            <h3><?php echo __('Le cadeau de la semaine'); ?></h3>
                        </div>
                    </li>
                </ul>
                <div class="home__sidebar-play-btn">
                    <div>
                        <h1><?php echo __('Jouer'); ?></h1>
                    </div>
                    <?php echo $this->Html->image('theme2/home_down_btn.png', array('width' => '40px')); ?>
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-md-8 col-lg-9 home__offer" style="background-image:url(<?php echo $this->webroot.'app/webroot'.$day['background']; ?>);">
            <div class="home__offer-day">
                <div class="home__offer-day-voucher">
                    <h4><?php echo __('Bon de réduction'); ?></h4>
                    <p class="text-small text-italic"><?php echo $voucher['Voucher']['name']; ?></p>
                </div>
                <div class="home__offer-day-gift">
                    <h4><?php echo __('Cadeau du jour'); ?></h4>
                    <p class="text-small text-italic"><?php echo $day['title']; ?></p>
                </div>
            </div>
            <div class="home__offer-week">
                <h4><?php echo __('Cadeau du weekend'); ?></h4>
                <div class="home__offer-week-img" style="background-image:url(<?php echo $this->webroot.'app/webroot'.$weekend['background']; ?>);"></div>
                <div class="home__offer-week-title"><p class="text-small text-italic"><?php echo $weekend['title']; ?></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row home__concept">
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
    </div>
</div>
