<div class="banners form">
        <?php echo $this->Form->create('Banner', array('type' => 'file')); ?>
        <fieldset>
                <legend><?php echo __('Edit Banner'); ?></legend>
                <?php
                echo $this->Form->input('id', array('class' => 'form-control'));
                echo $this->Form->input('start', array('class' => 'form-control', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
                echo $this->Form->input('end', array('class' => 'form-control', 'dateFormat' => 'DMY', 'timeFormat' => '24'));
                echo $this->Form->input('background', array('class' => 'form-control', 'type' => 'file'));
                echo $this->Form->input('title', array('class' => 'form-control'));
                echo $this->Form->input('subtitle', array('class' => 'form-control'));
                echo $this->Form->input('region_id', array('class' => 'form-control'));
                echo $this->Form->input('banner_type_id', array('class' => 'form-control'));
                ?>
        </fieldset>
        <hr>
        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
        <?php echo $this->Form->end(); ?>
</div>
