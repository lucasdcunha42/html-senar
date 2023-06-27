if($('.onde-estamos.search-section').length) {

    var regioes = $('select[name="regioes"]');
    var cidades = $('select[name="cidades"]');

    var trResults = $('.table-results tbody tr');

    regioes.on('change', function() {
        cidades.find('option').hide();
        cidades.find('option').first().show();
        cidades.val("");
        cidades.find('option').each(function(index, el) {
            var $el = $(el);
            if($el.data('regiao') == regioes.val()) {
                $el.show();
            }
        });

        trResults.hide();

        var repeated = [];

        trResults.each(function(index, el) {
            var $el = $(el);
            var tds = $el.find('td');

            var item = $.trim($(tds[0]).text()) + $.trim($(tds[1]).text());
            // console.log(item);
            // console.log(repeated);
            if(repeated.indexOf(item) > -1) {
                return true;
            }

            repeated.push(item);

            if($el.data('regiao') == regioes.val()) {
                if($el.hasClass('hide')) {
                    $el.removeClass('hide');
                }
                $el.show();
            }
        });
    });

    cidades.on('change', function() {
        trResults.hide();
        trResults.each(function(index, el) {
            var $el = $(el);
            if($el.data('cidade') == cidades.val()) {
                if($el.hasClass('hide')) {
                    $el.removeClass('hide');
                }
                $el.show();
            }
        });
    });

    // initial
    var _repeateds = [];

    trResults.each(function(index, el) {
        var $el = $(el);
        var tds = $el.find('td');
        var item = $.trim($(tds[1]).text());

        if(_repeateds.indexOf(item) > -1) {
            return true;
        }

        $el.show('fast');
        _repeateds.push(item);
    });
}
