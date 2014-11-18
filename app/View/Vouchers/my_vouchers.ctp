<div class='container'>
        <div class='row'>
                <div class='col-sm-12'>
                        <h1>Mes bons</h1>
                        <?php if (empty($user['Gift']) && empty($user['BigGift']) && empty($user['Voucher'])): ?>
                                <p class="lead">Rien ici pour le moment alors dépêche-toi de jouer ! </p>
                        <?php endif; ?>
                </div>
        </div>
        <div class='row'>
                <?php
                $i = 0;
                foreach ($user['BigGift'] as $bgift): $i++;
                        ?>
                        <?php if ($bgift['used'] == null): ?>
                                <div class='col-sm-4'>
                                        <div class='thumbnail bigGift'>
                                                <i class="fa fa-birthday-cake"></i> <h5 class="title-vouch">Gros cadeau</h5>
                                                <div class="clear"></div>
                                                <?php echo $this->Html->image($bgift['media'], array('class' => 'img-responsive')) ?>
                                                <h3><?php echo $bgift['name'] ?></h3>
                                                <p>
                                                        <?php
                                                        echo $this->Text->truncate($bgift['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                        ?>
                                                </p>
                                                <?php if ($bgift['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'bigGifts', 'action' => 'use_it', $bgift['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Détail'), array('controller' => 'bigGifts', 'action' => 'view', $bgift['id']), array('class' => 'btn btn-default')) ?>
                                                        <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'bigGifts', 'action' => 'delete', $bgift['id']), array('class' => 'btn btn-danger'), __('Es-tu sûr ?')); ?>

                                                <?php else: ?>
                                                        <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $bgift['used']) ?></span></h3>
                                                <?php endif; ?>    
                                        </div>
                                </div>
                                <?php if ($i % 3 == 0): ?>
                                        <div class="clear"></div>
                                <?php endif; ?>
                        <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class='row'>
                <?php
                $i = 0;
                foreach ($user['Gift'] as $gift): $i++;
                        ?>
                        <?php if ($gift['used'] == null): ?>
                                <div class='col-sm-4'>
                                        <div class='thumbnail gift'>
                                                <i class="fa fa-gift"></i>  <h5 class="title-vouch">Cadeau</h5>
                                                <div class="clear"></div>
                                                <?php echo $this->Html->image($gift['media'], array('class' => 'img-responsive')) ?>
                                                <h3><?php echo $gift['name'] ?></h3>
                                                <p>
                                                        <?php
                                                        echo $this->Text->truncate($gift['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                        ?>
                                                </p>
                                                <?php if ($gift['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'gifts', 'action' => 'use_it', $gift['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Détail'), array('controller' => 'gifts', 'action' => 'view', $gift['id']), array('class' => 'btn btn-default')) ?>
                                                        <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), array('class' => 'btn btn-danger'), __('Es-tu sûr ?')); ?>


                                                <?php else: ?>
                                                        <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $gift['used']) ?></span></h3>
                                                <?php endif; ?>    
                                        </div>
                                </div>
                                <?php if ($i % 3 == 0): ?>
                                        <div class="clear"></div>
                                <?php endif; ?>
                        <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class='row'>
                <?php
                $i = 0;
                foreach ($user['Voucher'] as $voucher):$i++
                        ?>
                        <?php if ($voucher['UserVoucher']['used'] == null): ?>
                                <div class='col-sm-4'>
                                        <div class='thumbnail voucher'>
                                                <i class="fa fa-barcode"></i> <h5 class="title-vouch">Bon de réduction</h5>
                                                <div class="clear"></div>
                                                <?php echo $this->Html->image($voucher['image'], array('class' => 'img-responsive')) ?>
                                                <h3><?php echo $voucher['name'] ?></h3>
                                                <p>
                                                        <?php
                                                        echo $this->Text->truncate($voucher['description'], 150, array('ellipsis' => '...', 'exact' => false));
                                                        ?>
                                                </p>
                                                <?php if ($voucher['UserVoucher']['used'] == null): ?>
                                                        <?php echo $this->Html->link(__('Utiliser'), array('controller' => 'vouchers', 'action' => 'use_it', $voucher['id']), array('class' => 'btn btn-success')) ?>
                                                        <?php echo $this->Html->link(__('Détail'), array('controller' => 'vouchers', 'action' => 'view', $voucher['id']), array('class' => 'btn btn-default')) ?>
                                                        <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'vouchers', 'action' => 'delete', $voucher['UserVoucher']['id']), array('class' => 'btn btn-danger'), __('Es-tu sûr ?')); ?>

                                                <?php else: ?>
                                                        <h3><span class="label label-danger"><?php echo $this->Time->format('d/m/Y H:i:s', $voucher['UserVoucher']['used']) ?></span></h3>
                                                <?php endif; ?>    
                                        </div>
                                </div>
                                <?php if ($i % 3 == 0): ?>
                                        <div class="clear"></div>
                                <?php endif; ?>
                        <?php endif; ?>
                <?php endforeach; ?>
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
</div>

