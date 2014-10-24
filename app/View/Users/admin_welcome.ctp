<?php $result =  $this->requestAction(array('controller'=>'questions', 'action'=>'get_nb_today_player'))?>

<div class="row">
        <div class="col-sm-12">
                <div class="jumbotron">
                        <h1>Hello !</h1>
                        <p>
                                QuestionMe v.0.1
                        </p>
                </div>
        </div>

        <div class="col-sm-12">
                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de participants aujourd'hui <strong><?php echo $result['user'];?></strong>
                </div>
                
                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de q_fixe répondues aujourd'hui <strong><?php echo $result['qfixe'];?></strong>
                </div>
                
                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de q_mobile répondues aujourd'hui <strong><?php echo $result['qmobile'];?></strong>
                </div>
                
                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de q_profile répondues aujourd'hui <strong><?php echo $result['qprofile'];?></strong>
                </div>
        </div>

</div>