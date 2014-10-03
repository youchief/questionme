<?php echo $this->Form->create('Question', array('id' => 'myForm', 'class' => 'fs-form fs-form-full', 'autocomplete' => 'off')) ?>

<ol class="fs-fields">
        <?php $i = 1 ?>
        <?php foreach ($questions as $question): ?>
                <li data-input-trigger>
                        <label class="fs-field-label fs-anim-upper" for="<?php echo $question['Question']['id'] ?>"><?php echo $question['Question']['question'] ?></label>
                        <?php if (!empty($question['Question']['media'])): ?>
                                <br>
                                <div class='fs-anim-lower'>
                                        <?php echo $this->Html->image($question['Question']['media'], array('width' => '100%')) ?>
                                </div>
                        <?php endif; ?>

                        <div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
                                <?php $y = 1; ?>
                                <?php foreach ($question['Choice'] as $choice): ?>
                                        <span>
                                                <input id="<?php echo 'q' . $y . $i ?>" name="<?php echo $question['Question']['id'] ?>" type="radio" value="<?php echo $choice['id'] ?>"/>
                                                <label for="<?php echo 'q' . $y . $i ?>" class="radio-conversion"><?php echo $choice['response'] ?></label>
                                        </span>
                                        <?php $y++ ?>
                                <?php endforeach; ?>
                        </div>
                </li>
                <?php $i++ ?>
        <?php endforeach; ?>


</ol><!-- /fs-fields -->
<?php echo $this->Form->submit('Envoyer mes réponses', array('class'=>'fs-submit'))?>
<?php echo $this->Form->end()?>