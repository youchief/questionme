<footer>
        <div class="container">
                <div class="row">
                        <div class="col-sm-2 col-xs-6">
                                <p>powered by <?php echo $this->Html->link('3xW','http://www.3xw.ch', array('target'=>'_blank'))?></p>
                        </div>
                        <div class="col-sm-8 text-center hidden-xs">
                                <?php echo $this->Html->link('A propos', array('controller'=>'pages', 'action'=>'display', 'about'))?>  
                                - 
                                <?php echo $this->Html->link('Contact', array('controller'=>'contacts', 'action'=>'contact'))?> 
                                - 
                                <?php echo $this->Html->link('Conditions générales', array('controller'=>'pages', 'action'=>'display', 'terms_and_conditions'))?> 
                        </div>
                        <div class="col-sm-2 text-right col-xs-6">
                                <a href="https://www.facebook.com/QuestionmeQME?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/QuestionmeQME" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="http://instagram.com/questionmeqme" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>

                </div>

        </div>
</footer>