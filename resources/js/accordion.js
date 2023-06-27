// accordion site

if($('.btn-open-close').length && $('.accord-title').length) {

    $('.accord-title').on('click', function(e) {
        $(this).find('.btn-open-close').first().trigger('click');
    });

    $('.btn-open-close').on('click', function(e) {
        // var link = null;

        // if($(this).find('a').first()) {
        //     link = $(this).find('a').first().attr('href');
        //     window.open(link, '_blank').focus();
        //     return false;
        // }

        e.stopPropagation();

        var _self = $(this);

        // se não tiver tag <a> como parent, segue o arccordion
        // caso tenha tag <a> carrega o link
        if(_self.parent().prop('tagName') != 'A') {

            _self.toggleClass('open');

            var slide = _self.hasClass('open') ? 'slideDown' : 'slideUp';

            _self.closest('.accord-item').find('.accord-desc')[slide]();
        }
    });

}
