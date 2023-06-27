// if($('.buttons-tipos button').length) {

//     var buttonsTipos = $('.buttons-tipos button');

//     buttonsTipos.on('click', function() {
//         var tipo = $(this).data('tipo');
//         if(tipo == 0) {
//             $('.agenda-itens [data-tipo]').stop().show('fast');
//             return false;
//         }
//         $('.agenda-itens [data-tipo]').stop().hide('fast');
//         $('.agenda-itens [data-tipo="'+ tipo +'"]').stop().show('fast');
//     });

// }

if($('.select-agenda-container-----').length) {

    var _selects = $('.select-agenda-container select');
    var _cursos = $('body .curso-item');

    var search = {};
        search.regiao_evento = '';
        search.modalidade = '';

    _selects.on('change', function() {

        window.ScrollData.currentCount = 0;
        $('body .curso-item').remove();
        window.doIt();
        return false;

        _cursos = $('body .curso-item');
        var isEmpty = true;

        _selects.each(function(index, el) {
            if($(el).val() != '') {
                isEmpty = false;
            }
        });

        // está vazio os 2 selects mostra todos os itens
        if(isEmpty) {
            _cursos.show('fast');
            return false;
        }

        search.regiao_evento = $('#cursos-regiao').first().val();
        search.modalidade = $('#cursos-modalidade').first().val();

        _cursos.hide('fast');

        _cursos.each(function(index, el) {
            var $el = $(el);
            var modalidade = $el.data('modalidade');
            var regiao = $el.data('regiao');

            if(search.modalidade != '' && search.regiao_evento != '') {
                if(modalidade == search.modalidade && regiao == search.regiao_evento) {
                    $el.stop().show('fast');
                } else {
                    $el.stop().hide('fast');
                }
            }

            if(search.modalidade != '' && search.regiao_evento == '') {
                if(modalidade == search.modalidade) {
                    $el.stop().show('fast');
                } else {
                    $el.stop().hide('fast');
                }
            }

            if(search.modalidade == '' && search.regiao_evento != '') {
                if(regiao == search.regiao_evento) {
                    $el.stop().show('fast');
                } else {
                    $el.stop().hide('fast');
                }
            }
        });
    });
}
