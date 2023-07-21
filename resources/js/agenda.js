if ($('.carregar-mais-agendas').length) {
    var loadMore = $('.carregar-mais-agendas a');
    var url = loadMore.attr('href');
    var agendasContainer = $('.agendas-container');
    var agendasLoading = $('.agendas-loading-container');
    var __inloading = false;
    var finishAgendas = false;
    var agendasRegiaoSelect = $('#agendas-regiao-select');
    var agendasModalidadeSelect = $('#agendas-modalidade-select');
    var reloadAll = false;

    $.each([agendasRegiaoSelect, agendasModalidadeSelect], function (index, el) {
        $(el).on('change', function () {
            reloadAll = true;
            finishAgendas = false;
            $('.carregar-mais-agendas').show();
            loadMore.trigger('click');
        });
    });

    loadMore.on('click', function (e) {
        e.preventDefault();

        if (__inloading || finishAgendas) {
            return false;
        }

        var skip = reloadAll ? 0 : $('.agendas-lista .agenda-item').length;

        var data = {
            skip: skip,
            regiao: agendasRegiaoSelect.val(),
            modalidade: agendasModalidadeSelect.val(),
        };

        __inloading = true;

        agendasLoading.show('fast');

        $.ajax({
            method: 'POST',
            url: url,
            data: data,
        })
        .done(function (response) {
            var _method = reloadAll ? 'html' : 'append';
            agendasContainer[_method](response.view);

            if (response.finish) {
                finishAgendas = true;
                $('.carregar-mais-agendas').hide();
            }
        })
        .fail(function (jqXHR, textStatus) {
            // Tratar falha, se necessário
        })
        .always(function () {
            reloadAll = false;
            __inloading = false;
            agendasLoading.hide('fast');
        });
    });
}
