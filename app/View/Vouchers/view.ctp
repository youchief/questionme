<div class='container'>
        <div class='col-sm-6'>
                <?php echo $this->Html->image($voucher['Voucher']['image'], array('class' => 'img-responsive')) ?>

                <div class="btn-group">
                        <?php echo $this->Html->link(__('Utiliser'), array('action' => 'use_it', $voucher['Voucher']['id']), array('class' => 'btn btn-success')); ?>       
                </div>
        </div>      
        <div class='col-sm-6'>
                <h1><?php echo h($voucher['Voucher']['name']); ?></h1>
                <h2><?php echo h($voucher['Customer']['name']); ?></h2>
                <p>
                        <?php echo $voucher['Voucher']['description']; ?>
                </p>
                <h4><?php echo __('Validité'); ?></h4>
                <p><?php echo $this->Time->format('d/m/Y',$voucher['Voucher']['validity']); ?></p>
                <h4><?php echo __('Conditions'); ?></h4>
                <p>
                        <?php echo $voucher['Voucher']['conditions']; ?>
                </p>
        </div>
        <div class="row">
                <div class="col-sm-6 align-center col-sm-offset-3">
                        <?php echo $this->Html->link(__('Comment ça marche ?'), '#', array('class' => 'btn btn-success btn-lg', 'data-toggle' => "modal", 'data-target' => "#myModal")) ?>
                </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">

                                <div class="modal-body">
                                        <h3>FONCTIONNEMENT DU BON DE REDUCTION & DU CADEAU </h3>
                                        <ol>
                                                <li>
                                                           Regarde les conditions d’utilisation dans DETAIL.
                                                </li>
                                                <li>
                                                        Rends-toi chez le partenaire et dis-lui que tu as un bon QuestionMe.
                                                </li>
                                                <li>
                                                         Quand tu es chez le partenaire avec ton téléphone, appuie sur UTILISER (MES BONS)
                                                </li>
                                                <li>
                                                        Le partenaire met le code sur ton téléphone, et c’est tout bon !
                                                </li>
           
                                        </ol>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                        </div>
                </div>
        </div>
    
        <div class='col-sm-6 col-sm-offset-3 align-center'>
            <?php echo $this->Html->link(__('Revenir à mes bons'), array('controller' => 'vouchers', 'action' => 'my_vouchers'), array('class' => 'btn btn-default btn-lg')) ?><br/><br/>
        </div>
</div>

