<?php echo $this->Html->css('game') ?>
<div class="container">
        <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                        <h1><?php echo $question['Question']['question'] ?></h1>
                        <?php if (!empty($question['Question']['media'])): ?>

                                <div class="row">
                                        <div class="col-sm-12 ">
                                                <?php echo $this->Html->image($question['Question']['media'], array('width' => '100%')) ?>

                                        </div>
                                </div>
                        <?php endif; ?>
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-sm-12 ">
                        <?php
                        echo $this->Form->create('Question', array('autocomplete' => 'off', 'class' => 'form-inline'));
                        echo $this->Form->input('question', array('type' => 'hidden', 'value' => $question['Question']['id']));
                        echo $this->Form->input('type', array('type' => 'hidden', 'value' => $question['Question']['question_type_id']));
                        echo $this->Form->input('profile', array('type' => 'hidden', 'value' => $question['Question']['profile']));
                        echo $this->Form->input('response_type', array('type' => 'hidden', 'value' => $question['Question']['response_type']));
                        echo $this->Form->input('question_value', array('type' => 'hidden', 'value' => $question['Question']['question']));
                        echo $this->Form->input('final_order_question', array('type' => 'hidden', 'value' => $question['Question']['final_order_question']));
                        echo $this->Form->input('order_id', array('type' => 'hidden', 'value' => $question['Question']['order_id']));
                        foreach ($question['Choice'] as $c) {
                                if ($c['is_right']) {
                                        echo $this->Form->input('right_choice_value', array('type' => 'hidden', 'value' => $c['response']));
                                        echo $this->Form->input('right_choice_id', array('type' => 'hidden', 'value' => $c['id']));
                                }
                        }
                        ?>

                        <?php if ($question['Question']['response_type'] == 'RADIO'): ?>
                               
                                <div class='row'>

                                        <?php foreach ($question['Choice'] as $choice): ?>
                                                <div class='col-sm-3'>

                                                        <div class="radio <?php if (!empty($choice['media'])): ?>limg<?php endif; ?>">

                                                                <input type="radio" name="data[Question][response]" id="<?php echo "QuestionResponse" . $choice['id'] ?>" class="" required="required" value="<?php echo $choice['id'] ?>">
                                                                <label for="<?php echo "QuestionResponse" . $choice['id'] ?>">
                                                                        <?php if (!empty($choice['media'])): ?>
                                                                                <?php echo $this->Html->image($choice['media'], array('class' => 'img-responsive', 'for' => "QuestionResponse" . $choice['id'])); ?><br/>
                                                                        <?php endif; ?>
                                                                        <span class="center-text"><?php echo $choice['response'] ?></span>
                                                                </label>
                                                        </div>
                                                </div>
                                        <?php endforeach; ?>
                                </div>

                        <?php endif; ?>

                        <?php if ($question['Question']['response_type'] == 'CHECKBOX'): ?>
                         <div class="row">
                                        <div class="col-sm-12">
                                                <p>Plusieurs choix possibles</p>
                                        </div>
                                </div>
                                <div class='row'>
                                        <?php foreach ($question['Choice'] as $choice): ?>

                                                <div class='col-sm-3'>
                                                        <?php if (!empty($choice['media'])): ?>
                                                                <?php echo $this->Html->image($choice['media'], array('class' => 'img-responsive')); ?>
                                                        <?php endif; ?>
                                                        <div class="checkbox">
                                                                <input type="checkbox" name="data[Question][response][]" value="<?php echo $choice['id'] ?>" id="<?php echo "QuestionResponse" . $choice['id'] ?>">
                                                                <label for="<?php echo "QuestionResponse" . $choice['id'] ?>"><span class="center-text"><?php echo $choice['response'] ?></span></label>
                                                        </div>
                                                </div>

                                        <?php endforeach; ?>
                                </div>
                        <?php endif; ?>




                        <?php if ($question['Question']['response_type'] == 'FREE'): ?>
                                <?php echo $this->Form->input('response', array('type' => 'hidden', 'value' => $question['Choice'][0]['id'])); ?>
                                <?php echo $this->Form->input('free', array('class' => 'form-control', 'required' => 'required', 'label' => false)); ?>
                        <?php endif; ?>

                        <?php if ($question['Question']['response_type'] == 'SCALE'): ?>
                                <?php echo $this->Form->input('response', array('type' => '', 'required' => 'required', 'label' => false)); ?>
                        <?php endif; ?>

                        <br>



                </div>

        </div>
        <br/>
        <div class="row">
                <div class="col-sm-4  col-sm-offset-4 info-question">
                        <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rest * 100 / $qday_total ?>%;">
                                        <?php echo $rest * 100 / $qday_total ?>%
                                </div>

                        </div>
                </div>
                <div class="col-sm-1">
                        <p class="white"><?php echo $rest ?>/<?php echo $qday_total ?></p>
                </div>
                <div class="clear"></div>
                <div class="col-sm-12">            
                        <?php
                        echo $this->Form->submit('Suivant', array('class' => 'btn btn-success'));
                        echo $this->Form->end()
                        ?>
                </div>          
        </div>
</div>

