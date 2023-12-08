if($('.buttons-eventos').length) {

    var _buttons = $('.buttons-eventos [data-type]');
    var _eventosItems = $('.evento-item');

    function changeItems() {
        var arr = [];
        _buttons.each(function(index, el) {
            if($(el).hasClass('active')) {
                arr.push($(el).data('type'));
            }
        });

        _eventosItems.each(function(index, el) {
            var _fn = arr.indexOf($(el).data('type')) > -1 ? 'show' : 'hide';
            $(el)[_fn]('fast');
        });
    }

    _buttons.on('click', function() {
        $(this).toggleClass('active');

        if(!$('.buttons-eventos [data-type].active').length) {
            _eventosItems.show('fast');
            return false;
        }

        changeItems();

        // var type = $(this).data('type');
        // var _fn = $(this).hasClass('active') ? 'show' : 'hide';

        // $('.evento-item[data-type="' + type + '"]')[_fn]('fast');

        // _eventosItems.each(function(index, el) {

        //     if() {
        //         $(el).show('fast');
        //     } else {
        //         $(el).hide('fast');
        //     }

        // });
    });
}

if($('.banner-page').length) {
    $(function(){

        var shrinkHeader = 100;
        $(window).scroll(function() {
           var scroll = getCurrentScroll();
            if ( scroll >= shrinkHeader ) {
                $('.banner-page').addClass('pqno');
            }
            else {
                $('.banner-page').removeClass('pqno');
            }
        });
        function getCurrentScroll() {
           return window.pageYOffset || document.documentElement.scrollTop;
        }
    });
}
