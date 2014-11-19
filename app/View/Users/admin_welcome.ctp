<?php $result = $this->requestAction(array('controller' => 'questions', 'action' => 'get_nb_today_player')) ?>

<div class="row">
        <div class="col-sm-12">
                <div class="jumbotron">
                        <h1>Hello !</h1>
                        <p>
                                QuestionMe v.1.0
                        </p>
                        <div class="btn-group">
                                <?php echo $this->Html->link('Add Qday', array('controller' => 'qdays', 'action' => 'add', 'admin' => true), array('class' => 'btn btn-default')); ?>
                                <?php echo $this->Html->link('Question Wizard', array('controller' => 'questions', 'action' => 'wizard', 'admin' => true), array('class' => 'btn btn-default')); ?>
                                <?php echo $this->Html->link('Add Voucher', array('controller' => 'vouchers', 'action' => 'add', 'admin' => true), array('class' => 'btn btn-default')); ?>
                        </div>
                </div>
        </div>




        <div class="col-sm-12">
                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de participants aujourd'hui: <strong><?php echo $result['user']; ?></strong>
                </div>

                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de q_fixe répondues aujourd'hui: <strong><?php echo $result['qfixe']; ?></strong>
                </div>

                <div class="alert alert-warning fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        Nombre de q_mobile répondues aujourd'hui: <strong><?php echo $result['qmobile']; ?></strong>
                </div>

             
        </div>

</div>