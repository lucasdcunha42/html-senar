if($('.carregar-mais-cursos').length) {

    var loadMore = $('.carregar-mais-cursos a');
    var url = loadMore.attr('href');
    var cursosContainer = $('.cursos-container');

    var cursosLoading = $('.cursos-loading-container');

    var __inloading = false;
    var finishCursos = false;

    var cursosAreaInteresseSelect = $('#cursos-area-interesse-select');
    var cursosregioesSelect = $('#cursos-regiao-select');
    var cursosAnoMesSelect = $('#cursos-ano-mes-select');

    var reloadAll = false;

    $.each([
        cursosAreaInteresseSelect,
        cursosregioesSelect,
        cursosAnoMesSelect
    ], function(index, el) {
        $(el).on('change', function() {
            reloadAll = true;
            finishCursos = false;
            $('.carregar-mais-cursos').show();
            loadMore.trigger('click');
        });
    });

    loadMore.on('click', function(e) {
        e.preventDefault();

        if(__inloading || finishCursos) {
            return false;
        }

        var skip = reloadAll ? 0 : $('.cursos-lista .curso-item').length;

        var data = {
            skip: skip,
            interesse: cursosAreaInteresseSelect.val(),
            regiao: cursosregioesSelect.val(),
            anoMes: cursosAnoMesSelect.val()
        }

        __inloading = true;

        cursosLoading.show('fast');

        $.ajax({
            method: 'POST',
            url: url,
            data: data
        })
        .done(function( response ) {

            var _method = reloadAll ? 'html' : 'append';

            cursosContainer[_method](response.view);

            if(response.finish) {
                finishCursos = true;
                $('.carregar-mais-cursos').hide();
            }

        })
        .fail(function(jqXHR, textStatus) {

        })
        .always(function() {
            reloadAll = false;
            __inloading = false;
            cursosLoading.hide('fast');
        });
    });
}
