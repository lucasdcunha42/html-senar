var ACTION_BUTTONS_FN = {
    showFormLicitacaoCliente: function() {
        $('.form-licitacao').hide('fast');
        $('#form-licitacao-cliente').show('fast');
    },
    showFormLicitacaoEmpresa: function() {
        $('.form-licitacao').hide('fast');
        $('#form-licitacao-empresa').show('fast');
    }
}

if($('.action-button').length) {
    $('.action-button').on('click', function() {
        var fn = $(this).data('method');
        ACTION_BUTTONS_FN[fn]();
    });
}
