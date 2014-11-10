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

function elementsResize() {
    var windowWidth = $(window).innerWidth;
    var windowHeight = $(window).innerHeight;
    $('.home-layer').width(windowWidth);
    $('.home-layer').height(windowHeight);
    $('.home-prince').width(windowWidth);
    $('.home-prince').height(windowHeight);
    $('.home-play').width(windowWidth);
    $('.home-play').height(windowHeight);
    $('.home-info').width(windowWidth);
    $('.home-info').height(windowHeight);     
    
    
    //ASIDE
    if(windowWidth < 767){
        $('.home-play-aside').height('50%');
        $('.home-play-gallery').height('50%');
    } else {
        $('.home-play-aside').height(windowHeight);
        $('.home-play-gallery').height(windowHeight);
    }
}

function goPlayM(){
    
    //Vars
    homeWidth = $('.home-layer').width();
    homeHeight = $('.home-layer').height();
    
    //Move Base
    
    $('.home-play').css('bottom', -homeHeight);
    $('.home-play').show();
    $('.home-play').animate({bottom: 0}, 500, function() {$('.home-prince').hide();});
    
    
    //Set Aside
    if(homeWidth < 767){
        $('.home-play-aside').height('50%');
        $('.home-play-gallery').css({ 'height': '50%'});
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').css({ 'height': $(window).outerHeight()});
    }
    
    //Show Home Play
    $('.navbar').show();
    $('.home-play').animate({right: 0}, 500,function() { });
        
    //Start Slider    
    $('.carousel').carousel({
    	pause: "false",
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
    $('.navbar').hide();
    //Vars
    homeWidth = $('.home-layer').width();
    homeHeight = $('.home-layer').height();
    
    //Move Base
    
    $('.home-play').css('right', -homeWidth);
    $('.home-play').show();
    $('.home-play').animate({right: 0}, 200, function() {
           $('.home-prince').hide();
           $('.navbar').show();
       });
    
    
    //Set Aside
    if(homeWidth < 767){
        $('.home-play-aside').height('50%');
        $('.home-play-gallery').css({ 'height': '50%'});
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').css({ 'height': $(window).outerHeight()});
    }
    
    //Show Home Play
    
    $('.home-play').animate({right: 0}, 500,function() { });
        
    //Start Slider    
    $('.carousel').carousel({
    	pause: "false",
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

function goInfos(){
    homeHeight = $('.home-layer').height(); 
    $('.home-play').animate({top: - homeHeight}, 500, function() {$('.home-play').hide();});
    $('#info-1').show();
    $('#info-2').hide();
    $('#info-3').hide();
    $('#info-4').hide();
    $('.home-info')
        .show()
        .animate({top: 0}, 500, function() {
        });
    
}

function goInfo1R() {
    $('#info-1').show();
    $('#info-2').animate({right: -homeWidth}, 500, function(){$('#info-2').hide();});
}

function goInfo2() {
    homeWidth = $('.home-layer').width();
    homeHeight = $('.home-layer').height();
    
    $('#info-2').css('right', -homeWidth).show();
    $('#info-2').animate({right: 0}, 500, function(){$('#info-1').hide();});
}

function goInfo2R() {
    $('#info-2').show();
    $('#info-3').animate({right: -homeWidth}, 500, function(){$('#info-3').hide();});
}

function goInfo3() {
    homeWidth = $('.home-layer').width();
    homeHeight = $('.home-layer').height();
    
    $('#info-3').css('right', -homeWidth).show();
    $('#info-3').animate({right: 0}, 500, function(){$('#info-2').hide();});
}

function goInfo3R() {
    $('#info-3').show();
    $('#info-4').animate({right: -homeWidth}, 500, function(){$('#info-4').hide();});
}

function goInfo4() {
    homeWidth = $('.home-layer').width();
    homeHeight = $('.home-layer').height();
    
    $('#info-4').css('right', -homeWidth).show();
    $('#info-4').animate({right: 0}, 500, function(){$('#info-3').hide();});
}

function rePlay(){
    homeHeight = $('.home-layer').height();
    $('.home-play').css('top', - homeHeight).show();
    if(homeWidth < 767){
        $('.home-play-aside').height('50%');
        $('.home-play-gallery').css({ 'height': '50%'});
    } else {
        $('.home-play-aside').height($(window).height());
        $('.home-play-gallery').css({ 'height': $(window).outerHeight()});
    }
    $('.home-play').animate({top: 0}, 500, 
        function() {
            $('.home-info').hide();
        });
    $('.carousel').carousel({
    	pause: "false",
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
    
    var wWidth = $(window).width(); 
    var wHeight = $(window).height(); 
    
    //HOME//
     
    $('.home-play').hide();
    $('.home-info').hide();
    
    $('#info-2').hide();
    $('#info-3').hide();
    $('#info-4').hide();
    
    var home = $('.home-layer').width();
    if(home > 0){
      $('.navbar').hide();  
    }
    
    $('.footer').hide();
     
    
    
    
    $('.go-play-m').click(function(){goPlayM();});
    $('.go-play-d').click(function(){goPlayD();});
    $('.go-info').click(function(){goInfos();});
    $('.go-replay').click(function(){rePlay();});
    
    $('.info-1').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-1').css('right', -homeWidth).css('z-index', '2').show();
       $('#info-1').animate({right: 0}, 500, function(){infoH.hide();});
    });
    
    $('.info-2').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-2').css('right', -homeWidth).css('z-index', '2').show();
       $('#info-2').animate({right: 0}, 500, function(){infoH.hide();});
    });
    
    $('.info-3').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-3').css('right', -homeWidth).css('z-index', '2').show();
       $('#info-3').animate({right: 0}, 500, function(){infoH.hide();});
    });
    
    $('.info-4').click(function(){
       var infoH = $(this).closest( ".info-i" );
       infoH.css('z-index', '1');
       $('#info-4').css('right', -homeWidth).css('z-index', '2').show();
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
    
});    

$(window).resize(function(){
    elementsResize();
});

