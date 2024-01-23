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

if($('#form-evento-incricao').length){

    $('#cpf').mask('000.000.000-00', {reverse: true});

    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
        }
    };
    $('#telefone').mask(maskBehavior, options);

    $('form').on('submit', function(){
        $('#cpf').unmask();
        $('#telefone').unmask();
    });
}
