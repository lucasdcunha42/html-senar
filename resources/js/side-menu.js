$('.side-menu-item a').on('click', function(e) {

    if($(this).siblings('ul').length) {
        e.preventDefault();
        $(this).next().slideToggle();
    }

});
