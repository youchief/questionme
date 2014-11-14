<div class="alert custom_message" role="alert">
    <div class="row">
        <div class='col-xs-5 col-sm-2'>
            <?php echo $this->Html->image('dangerman.png', array('class' => 'img-responsive')) ?>
        </div>
        <div class='col-xs-7  col-sm-10 custom_message_text'>
            <span class="custom_message_text_c">              
                <p>
                    <?php echo h($message); ?>
                </p>
            </span>
        </div>
    </div>
</div>