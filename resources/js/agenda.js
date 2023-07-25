if($('.carregar-mais-agendas').length) {

    var _loadMore = $('.carregar-mais-agendas a');
    var _url = _loadMore.attr('href');
    var agendasContainer = $('.agendas-container');
    var agendasLoading = $('.agendas-loading-container');

    var ___inloading = false;
    var finishAgendas = false;

    var agendasCidadeSelect = $('#agendas-cidade-select');

    var reloadAll = false;

    $.each([
        agendasCidadeSelect
    ], function(index, el) {
        $(el).on('change', function() {
            reloadAll = true;
            finishAgendas = false;
            $('.carregar-mais-agendas').show();
            _loadMore.trigger('click');
        });

    });

    _loadMore.on('click', function(e) {
        e.preventDefault();

        if(___inloading || finishAgendas) {
            return false;
        }

        var skip = reloadAll ? 0 : $('.agenda-lista .agendas-item').length;

        var data = {
            skip: skip,
            cidade: agendasCidadeSelect.val()
        }
        console.log(data);
        ___inloading = true;

        agendasLoading.show('fast');

        $.ajax({
            method: 'POST',
            url: _url,
            data: data
        })
        .done(function( response ) {

            var _method = reloadAll ? 'html' : 'append';

            agendasContainer[_method](response.view);

            if(response.finish) {
                finishAgendas = true;
                $('.carregar-mais-agendas').hide();
            }

        })
        .fail(function(jqXHR, textStatus) {

        })
        .always(function() {
            reloadAll = false;
            ___inloading = false;
            agendasLoading.hide('fast');
        });
    });
}
