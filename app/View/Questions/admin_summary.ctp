<?php $gamers = $this->requestAction(array('controller' => 'users', 'action' => 'get_nb_gamer')) ?>
<?php $user_played = $this->requestAction(array('controller' => 'questions', 'action' => 'get_nb_user_per_question', $question['Question']['id'])) ?>

<div class="row">
        <div class='col-sm-12'>
                <h1><?php echo $question['Question']['question'] ?></h1>
                <h3><span class="label label-success"><?php echo $this->Number->toPercentage(($user_played * 100) / $gamers) ?></span> de participation</h3>
        </div>

</div>
<div class='row'>
        <?php if ($question['Question']['response_type'] == 'FREE'): ?>
                <div class="col-sm-12">
                        <table class="table">
                                <tr>
                                        <th>
                                                Réponse
                                        </th>
                                        <th>
                                                User
                                        </th>
                                        <th>
                                                Sexe
                                        </th>
                                        <th>
                                                Birthday
                                        </th>
                                </tr>
                                <?php foreach ($question['Choice'][0]['User'] as $choice): ?>
                                        <tr>
                                                <td>
                                                        <?php echo $choice['UsersChoice']['free'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $choice['username'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $choice['sex'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $choice['birthday'] ?>
                                                </td>
                                        </tr>


                                <?php endforeach; ?>
                        </table>
                </div>
        <?php else: ?>

                <?php foreach ($question['Choice'] as $choice): ?>
                        <?php
                        $male = 0;
                        $female = 0;
                        foreach ($choice['User'] as $user) {
                                if ($user['sex'] == 'male') {
                                        $male++;
                                } else {
                                        $female++;
                                }
                        }
                        ?>
                        <div class='col-sm-4'>
                                <div class='thumbnail'>
                                        <h3><?php echo $choice['response'] ?></h3>

                                        <ul class="nav nav-pills nav-stacked">
                                                <li class="">
                                                        <a href="#">


                                                                <span class="badge pull-right"><?php echo count($choice['User']) ?></span>
                                                                Nombre de répondants
                                                        </a>
                                                </li>


                                        </ul>
                                        <ul class="nav nav-pills nav-stacked">
                                                <li class="">
                                                        <a href="#">


                                                                <span class="badge pull-right"><?php echo $male ?></span>
                                                                Homme
                                                        </a>
                                                </li>


                                        </ul>
                                        <ul class="nav nav-pills nav-stacked">
                                                <li class="">
                                                        <a href="#">


                                                                <span class="badge pull-right"><?php echo $female ?></span>
                                                                Femme
                                                        </a>
                                                </li>


                                        </ul>
                                </div>
                        </div>
                <?php endforeach; ?>
        <?php endif; ?>
</div>