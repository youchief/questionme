function init() {
        window.addEventListener('scroll', function (e) {
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                        shrinkOn = 300,
                        header = document.querySelector("header");
                if (distanceY > shrinkOn) {
                        classie.add(header, "smaller");
                } else {
                        if (classie.has(header, "smaller")) {
                                classie.remove(header, "smaller");
                        }
                }
        });
        
 }

var windowH = $(window).height()
var windowW = $(window).width();

function elementsResize() {
   
    //ASIDE
    if($(window).width() < 767){
        $('.home-play-aside').height($(window).height() / 2);
        $('.home-play-aside').css('top', '50%');
        $('.home-play-gallery').height($(window).height()/ 2);
        $('.home-play-gallery').css('top', '0px');
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').height($(window).height());
    }
    
    var play = $('.home-play').is(":visible");
    

    if(play == true){
      if($(window).width() < 767){
          $('.navbar-brand').show();

      } else {
          $('.navbar-brand').hide();

      }
    }
    $('#info-1').css('top', '0px');
    $('#info-2').css('top', '0px');
    $('#info-3').css('top', '0px');
    $('#info-4').css('top', '0px');
}

function goPlayM(){
   
    
    //Move Base
    
    $('.home-play').css('bottom', -$(window).height());
    $('.home-play').show();
    $('.home-play').animate({bottom: 0}, 500, function() {$('.home-prince').hide();$('.custom_message').hide();});
    
    if($(window).width() < 767){
        $('.home-play-aside').height($(window).height() / 2);
        $('.home-play-aside').css('top', '50%');
        $('.home-play-gallery').height($(window).height() / 2);
        $('.home-play-gallery').css('top', '0px');     
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').height($(window).height());
    }
   
    
    //Show Home Play
    $('.navbar-brand').show();
    $('.home-play').animate({right: 0}, 500,function() { });
        
    //Start Slider    
    $('.carousel').carousel({
    	interval: 4000
    });
    
    //Response Full Slider
    $('.carousel').css({'margin': 0, 'width': '100%', 'height': '100%'});
    $('.carousel .item').css({ 'width': '100%', 'height': '100%'});
    
    //Full height crop images1
    $('.carousel-inner div.item img').each(function() {
            var imgSrc = $(this).attr('src');
            $(this).parent().css({'background': 'url('+imgSrc+') center center no-repeat', '-webkit-background-size': '100% ', '-moz-background-size': '100%', '-o-background-size': '100%', 'background-size': '100%', '-webkit-background-size': 'cover', '-moz-background-size': 'cover', '-o-background-size': 'cover', 'background-size': 'cover'});
            $(this).remove();
    });    
    
}

function goPlayD(){
    
    //Move Base
    $('.nav-brand').hide();
    $('.home-play').css('right', -$(window).width());
    $('.home-play').show();
    $('.home-play').animate({right: 0}, 200, function() {
           $('.home-prince').hide();
           $('.custom_message').hide();
       });
    
    
    //Set Aside
    if($(window).width() < 767){
        $('.home-play-aside').height($(window).height() / 2);
        $('.home-play-aside').css('top', '50%');
        $('.home-play-gallery').height($(window).height() / 2);
        $('.home-play-gallery').css('top', '0px');
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').height($(window).height());
    }
    
    //Show Home Play
    $('.navbar-brand').hide();
    $('.home-play').animate({right: 0}, 500,function() { });
        
    //Start Slider    
    $('.carousel').carousel({
        interval: 4000
    });
    
    //Response Full Slider
    $('.carousel').css({'margin': 0, 'width': '100%', 'height': '100%'});
    $('.carousel .item').css({ 'width': '100%', 'height': '100%'});
    
    //Full height crop images1
    $('.carousel-inner div.item img').each(function() {
            var imgSrc = $(this).attr('src');
            $(this).parent().css({'background': 'url('+imgSrc+') center center no-repeat', '-webkit-background-size': '100% ', '-moz-background-size': '100%', '-o-background-size': '100%', 'background-size': '100%', '-webkit-background-size': 'cover', '-moz-background-size': 'cover', '-o-background-size': 'cover', 'background-size': 'cover'});
            $(this).remove();
    });    
    
    $(function(){
        var lastScrollTop = 0, delta = 10;
        $(window).scroll(function(){
           var st = $(this).scrollTop();

           if(Math.abs(lastScrollTop - st) <= delta)
              return;

           if (st > lastScrollTop){
               goInfos();
           } else {
              // upascroll code
           }
           lastScrollTop = st;
        });
    });
    
}

function goInfos(){ 
    $('.home-play').animate({top: - $(window).height()}, 500, function() {
        $('.home-play').hide();
        $('.navbar-brand').show();
        $('.home-info')
        .show()
        .animate({top: 0}, 500, function() {$('.home-info').css('left', '0');
        });
    });
    
    
    
    $('#info-1').show();
    $('#info-2').hide();
    $('#info-3').hide();
    $('#info-4').hide();
    
    
    
    
}

function goInfo1R() {
    $('#info-1').show();
    $('#info-2').animate({right: -$(window).width()}, 500, function(){$('#info-2').hide();});
}

function goInfo2() {
    
    $('#info-2').css('right', -$(window).width()).show();
    $('#info-2').animate({right: 0}, 500, function(){$('#info-1').hide();});
}

function goInfo2R() {
    $('#info-2').show();
    $('#info-3').animate({right: -$(window).width()}, 500, function(){$('#info-3').hide();});
}

function goInfo3() {
    
    $('#info-3').css('right', -$(window).width()).show();
    $('#info-3').animate({right: 0}, 500, function(){$('#info-2').hide();});
}

function goInfo3R() {
    $('#info-3').show();
    $('#info-4').animate({right: -$(window).width()}, 500, function(){$('#info-4').hide();});
}

function goInfo4() {
    
    $('#info-4').css('right', -$(window).width()).show();
    $('#info-4').animate({right: 0}, 500, function(){$('#info-3').hide();});
}

function rePlay(){
    $('.home-play').css('top', - $(window).height()).show();
    if($(window).width() < 767){
        $('.home-play-aside').height($(window).height() / 2);
        $('.home-play-aside').css('top', '50%');
        $('.home-play-gallery').height($(window).height() / 2);
        $('.home-play-gallery').css('top', '0px');
        $('.navbar-brand').show();
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').height($(window).height());
        $('.navbar-brand').hide();
    }
    $('.home-play').animate({top: 0}, 500, 
        function() {
            $('.home-info').hide();
        });
    $('.carousel').carousel({
    	interval: 4000
    });

    $('.carousel').css({'margin': 0, 'width': '100%', 'height': '100%'});
    $('.carousel .item').css({'width': '100%', 'height': '100%'});
    $('.carousel-inner div.item img').each(function() {
            var imgSrc = $(this).attr('src');
            $(this).parent().css({'background': 'url('+imgSrc+') center center no-repeat', '-webkit-background-size': '100% ', '-moz-background-size': '100%', '-o-background-size': '100%', 'background-size': '100%', '-webkit-background-size': 'cover', '-moz-background-size': 'cover', '-o-background-size': 'cover', 'background-size': 'cover'});
            $(this).remove();
    });  
    
}

window.onload = init();

$(window).ready(function(){
    
    //HOME//
     
    $('.home-play').hide();
    $('.home-info').hide();
    
    $('#info-2').hide();
    $('#info-3').hide();
    $('#info-4').hide();
    
    var home = $('.home-layer').width();
    
    if(home > 0){
      $('.navbar-brand').hide();  
      $('.content-wrap').css('padding', '0px');
      $('.footer').remove();
    }
      
    $('.go-play-m').click(function(){goPlayM();});
    $('.go-play-d').click(function(){goPlayD();});
    $('.go-info').click(function(){goInfos();});
    
    if($(window).width() > 768){
        $('.home-prince-block').click(function(){goPlayD();});
    }else{
        $('.home-prince-block').click(function(){goPlayM();});
    }
    
    
    $('.info-1').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-1').css('right', -$(window).width()).css('z-index', '2').show();
       $('#info-1').animate({right: 0}, 500, function(){infoH.hide();});
    });
    
    $('.info-2').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-2').css('right', -$(window).width()).css('z-index', '2').show();
       $('#info-2').animate({right: 0}, 500, function(){infoH.hide();});
    });
    
    $('.info-3').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-3').css('right', -$(window).width()).css('z-index', '2').show();
       $('#info-3').animate({right: 0}, 500, function(){infoH.hide();});
    });
    
    $('.info-4').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-4').css('right', -$(window).width()).css('z-index', '2').show();
       $('#info-4').animate({right: 0}, 500, function(){infoH.hide();});
    });
        
    $("#home-prince").swipe( { swipe:function(event, direction, distance, duration, fingerCount) {goPlayM();},threshold:0 });
    $("#home-play").swipe( { swipeUp:function(event, direction, distance, duration, fingerCount) {goInfos();},threshold:0 });
    $("#home-info").swipe( { swipeDown:function(event, direction, distance, duration, fingerCount) {rePlay();},threshold:0 });
    
    $("#info-1").swipe( { swipeLeft:function(event, direction, distance, duration, fingerCount) {goInfo2();},threshold:0 });
    $("#info-2").swipe( { 
        swipeLeft:function(event, direction, distance, duration, fingerCount) {goInfo3();},
        swipeRight:function(event, direction, distance, duration, fingerCount) {goInfo1R();},       
        threshold:0 
    });
    $("#info-3").swipe( { 
        swipeLeft:function(event, direction, distance, duration, fingerCount) {goInfo4();},
        swipeRight:function(event, direction, distance, duration, fingerCount) {goInfo2R();},
        threshold:0 
    });
    $("#info-4").swipe( { swipeRight:function(event, direction, distance, duration, fingerCount) {goInfo3R();},threshold:0 });

    
    $('#myCarousel').swipe({
        swipeLeft:function(){$('.carousel').carousel('next');},
        swipeRight:function(){$('.carousel').carousel('prev');},
        threshold:0    
    });
    
    $(function() {
        $('.carousel').carousel();
        var caption = $('div.item:nth-child(1) .carousel-caption-new');
        $('.home-play-aside-cont').html(caption.html());
        caption.css('display','none');
        $(".carousel").on('slide.bs.carousel', function(evt) {
           var caption = $('div.item:nth-child(' + ($(evt.relatedTarget).index()+1) + ') .carousel-caption-new');
           $('.home-play-aside-cont').hide().html(caption.html()).fadeIn(500);
           caption.css('display','none');
        });
    });
    
    var alertText = $('.custom-message-text');
    var alertCont =  alertText.closest('row');
    var heightImg = alertCont.find('.col-sm-2').height();
    
    alertText.height(heightImg);
    
    
    

});    

$(window).resize(function(){
    elementsResize();
    
    var alertText = $('.custom-message-text');
    var alertCont =  alertText.closest('row');
    var heightImg = alertCont.find('.col-sm-2').height();
    
    alertText.height(heightImg);
});

