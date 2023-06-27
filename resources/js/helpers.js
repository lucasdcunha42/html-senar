if($('.go-to-div').length) {
    $('html,body').animate({
        scrollTop: $('.go-to-div').first().offset().top - 20
    }, 'slow');
}

if($('.hide-on-load').length) {
    $('.hide-on-load').hide();
}
