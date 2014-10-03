<style type="text/css">
        .navbar-wrapper {
                position: absolute;
                top: 0;
                right: 0;
                left: 0;
                z-index: 20;
        }
</style>
<?php $banners = $this->requestAction(array('controller' => 'banners', 'action' => 'gethome')) ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">

                <?php for ($index = 0; $index < count($banners); $index++): ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $index ?>" class=""></li>
                <?php endfor; ?>

        </ol>
        <div class="carousel-inner">
                <div class="item active fill">
                        <?php echo $this->Html->image($banners[0]['Banner']['background'], array('class' => 'img-responsive')) ?>
                        <div class="container">
                                <div class="carousel-caption">
                                        <h1><?php echo $banners[0]['Banner']['title'] ?></h1>
                                        <p><?php echo $banners[0]['Banner']['subtitle'] ?></p>
                                </div>
                        </div>
                </div>

                <?php for ($index = 1; $index < count($banners); $index++): ?>
                        <div class="item fill">
                                <?php echo $this->Html->image($banners[$index]['Banner']['background'], array('class' => 'img-responsive')) ?>
                                <div class="container">
                                        <div class="carousel-caption">
                                                <h1><?php echo $banners[$index]['Banner']['title'] ?></h1>
                                                <p><?php echo $banners[$index]['Banner']['subtitle'] ?></p>
                                        </div>
                                </div>
                        </div>
                <?php endfor; ?>

        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->
