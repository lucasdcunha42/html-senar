if($('.sindicatos #municipios').length) {

    var municipiosSelect = $('.sindicatos #municipios');
    var sistemasSelect = $('.sindicatos #sistema');

    var results = $('.sindicato-results tbody tr');

    var municipio = '';
    var sistema = '';

    function changeResults() {
        if(municipio == '' && sistema == '') {
            results.show('slow');
            return false;
        }

        results.hide();

        if(municipio != '' && sistema != '') {
            $.each(results, function(index, el) {
                var $el = $(el);

                if($el.data('municipio').indexOf(municipio) > -1 &&
                   $el.data('sistema') == sistema) {
                    $el.show('slow');
                }
            });
            return false;
        }

        if(municipio != '' && sistema == '') {
            $.each(results, function(index, el) {
                var $el = $(el);
                if($el.data('municipio').indexOf(municipio) > -1) {
                    $el.show('slow');
                }
            });
            return false;
        }

        if(municipio == '' && sistema != '') {
            $.each(results, function(index, el) {
                var $el = $(el);
                if($el.data('sistema') == sistema) {
                    $el.show('slow');
                }
            });
            return false;
        }
    }

    municipiosSelect.on('change', function() {
        municipio = municipiosSelect.val();

        changeResults();
    });

    sistemasSelect.on('change', function() {
        sistema = sistemasSelect.val();

        changeResults();
    });
}
