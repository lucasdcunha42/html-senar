
function getOption(label, value = '', selected = false) {
    var option = '<option value="'+value+'"';
    if(selected) {
        option += ' selected="selected"';
    }
    option += '>' + label + '</option>';

    return option;
}

if($('.state-select').length && $('.city-select').length) {

    var state_select = $('.state-select');
    var city_select = $('.city-select');

    var old_state = state_select.data('old');
    var old_city = city_select.data('old');

    var cities = {};

    $.getJSON(base_url + '/json/estados_cidades.json', function(data) {
        var state_options = getOption('Escolha o estado');
        $.each(data, function(key, val) {
            state_options += getOption(val.nome, val.sigla, old_state == val.sigla);

            var city_options =  getOption('Escolha a cidade');
            $.each(val.cidades, function(key,value) {
                city_options += getOption(value, value, old_city == value);
            });

            cities[val.sigla] = city_options;
        });

        state_select.html(state_options);
        state_select.on('change', function() {
            city_select.html(cities[state_select.val()]);
        });

        if(state_select.val() != '') {
            city_select.html(cities[state_select.val()]);
            if(old_city != '') {
                city_select.val(old_city);
            }
        }
    });
}
