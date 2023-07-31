if($('.carregar-mais-agendas').length) {

    var _loadMore = $('.carregar-mais-agendas a');
    var _url = _loadMore.attr('href');
    var agendasContainer = $('.agendas-container');
    var agendasLoading = $('.agendas-loading-container');


    var ___inloading = false;
    var finishAgendas = false;

    var agendasCidadeSelect = $('#agendas-cidade-select');
    var agendaTitulo = $('#titulo_agenda');
    var intervaloDeDatas = $('#calendarioAgenda');
    var limpaFiltro = $('#limpa-filtro');

    var reloadAll = false;

    $.each([
        agendasCidadeSelect, agendaTitulo, intervaloDeDatas
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
            cidade: agendasCidadeSelect.val(),
            titulo: agendaTitulo.val(),
            datas: intervaloDeDatas.val()
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

    $(document).ready(function() {

        // Crie uma função para limpar os filtros
        function limparFiltros() {
            agendasCidadeSelect.val(''); // Limpar o campo de seleção da cidade
            agendaTitulo.val(''); // Limpar o campo de título da agenda
            intervaloDeDatas.val(''); // Limpar o campo de intervalo de datas
            reloadAll = true;

            // Aqui você pode adicionar limpeza adicional para outros campos, se necessário
        }

        // Ao clicar no botão de limpar
        $("#limpar").on("click", function() {
            limparFiltros(); // Chame a função para limpar os filtros
            finishAgendas = false; // Defina finishAgendas como falso para permitir o carregamento de mais agendas novamente
            $('.carregar-mais-agendas').show(); // Mostre o botão de "Carregar mais" novamente
            _loadMore.trigger('click'); // Acione o clique no botão "Carregar mais" para recarregar as agendas
        });
    });
}
