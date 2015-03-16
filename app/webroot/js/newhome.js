var heightHome = function(){
    if($(window).width() > 768){
        $('.home__sidebar, .home__offer').css('height', ($(window).height() * 0.89) + 'px');
    }
    if($(window).height() < 795){
        $('.home__sidebar').height('auto');
        $('.home__offer').height($('.home__sidebar').outerHeight());
    }
}

$(document).ready(function(){
    heightHome();
});

$(window).resize(function(){
    heightHome();
});

