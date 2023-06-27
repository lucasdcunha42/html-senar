$('#nav-icon').on('click', function(){
    $(this).toggleClass('open');
    $('#side-menu-wrapper').toggleClass('open');
    $('.overlay').toggleClass('open');
});
