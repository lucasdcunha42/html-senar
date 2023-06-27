$('form .btn-submit').on('click', function(e) {
    e.preventDefault();

    var submitBtn = $(this);
    var loading = $(this).next('img');
    var form = $(this).closest('form');
    var action = form.attr('action');
    var method = form.attr('method');

    var config = {
        method: String(method).toUpperCase(),
        url: action,
        data: form.serialize()
    };

    submitBtn.hide('fast');
    loading.show('fast');

    $.ajax(config)
    .done(function( response ) {
        var alertText = '';
        var reset = true;
        if (!response.success) {
            alertText += 'Erro:\n';
            reset = false;
        }
        if(reset) {
            form.trigger('reset');
        }
        alert(alertText + response.message || '---');
    })
    .fail(function(jqXHR, textStatus) {
        var errors = '';
        $.each(jqXHR.responseJSON.errors, function (key, item) {
            errors += item + '\n';
        });
        alert(errors);
    })
    .always(function() {
        submitBtn.show('fast');
        loading.hide('fast');
    });

})
