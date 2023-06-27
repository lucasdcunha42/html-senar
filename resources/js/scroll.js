if($('[data-auto-load]').length) {

    var container = $('[data-auto-load]').first();
    window.ScrollData = container.data('auto-load');
    var finish = false;
    var loading = $('.loading-container');
    loading.hide();

    var loadForChangeFilter = false;

    var inLoading = false;
    var footer = $('.footer').first();

    window.doIt = function() {

        if(inLoading) {
            return false;
        }

        var footerHeight = footer ? footer.height() : 0;

        var loadForScroll = ($(window).scrollTop() + $(window).height() >= $(document).height() - footerHeight);

        if(loadForScroll || loadForChangeFilter) {
            loadForChangeFilter = false;
            inLoading = true;
            loading.show('fast');

            // data.filters = array de inputs ids (id="campo")
            if(typeof window.ScrollData.filters != 'undefined') {
                for(var i = 0; i < window.ScrollData.filters.length; i++) {
                    var filterName = window.ScrollData.filters[i];
                    var filterValue = $('#' + filterName).val();
                    if(filterValue != '') {
                        window.ScrollData[filterName] = filterValue;
                    }
                }
            }

            $.ajax({
                method: 'POST',
                url:  window.ScrollData.urlAjax,
                data: window.ScrollData
            })
            .done(function( response ) {

                window.ScrollData.currentCount = response.currentCount;
                container.append(response.view);

                $('.current-count').text(window.ScrollData.currentCount);

                if(typeof response.total != 'undefined') {
                    window.ScrollData.total = response.total;
                    $('.total-count').text(response.total);
                }

                console.log(window.ScrollData.total);
                console.log(window.ScrollData.currentCount);
                if(window.ScrollData.total <= window.ScrollData.currentCount) {
                    finish = true;
                }

                $('.of-count').show();

                inLoading = false;
                loading.hide('fast');
            })
            .fail(function(jqXHR, textStatus) {
                console.log(jqXHR, textStatus);
                inLoading = false;
                loading.hide('fast');
            });
        }
    }

    if(typeof window.ScrollData.filters != 'undefined') {
        for(var i = 0; i < window.ScrollData.filters.length; i++) {
            var filter = window.ScrollData.filters[i];
            $('#' + filter).on('change', function() {
                container.html('');
                window.ScrollData.currentCount = 0;
                $('.current-count, .total-count').text('');
                $('.of-count').hide();
                loadForChangeFilter = true;
                doIt();
            });
        }
    }
    // se tiver mais itens pra carregar
    if(window.ScrollData.total > window.ScrollData.currentCount) {
        $(window).scroll(function() {

            if(finish) {
                return false;
            }

            doIt();
        });
    }
}


