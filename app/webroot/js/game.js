$(window).ready(function(){
    
    setTimeout(function(){
        
        var qImg = document.querySelector('img.question_media')
        
        if(qImg !== null){
            
            var qImgWidth = document.querySelector('img.question_media').naturalWidth;
            if(qImgWidth > $('img.question_media').parent().width()){
                $('img.question_media').css('width', '100%');
            }else{
                $('img.question_media').css('width', '');
            }   
        }
        
    }, 10);
    
    
});

$(window).resize(function(){
    
    var qImg = document.querySelector('img.question_media')
        
        if(qImg !== null){
            
            var qImgWidth = document.querySelector('img.question_media').naturalWidth;
            if(qImgWidth > $('img.question_media').parent().width()){
                $('img.question_media').css('width', '100%');
            }else{
                $('img.question_media').css('width', '');
            }   
        }
    
    
});

