if($('.img-form').length) {
    $('.img-form').on('click', function() {
        var $self = $(this);
        var url = $self.data('route');
        var searchText = $('.search-text').val();
        var searchDate = $('.search-date').val();
        var hasSearch = false;

        if($.trim(searchText) != '') {
            hasSearch = true;
            url += '?busca=' + searchText;
        }

        if($.trim(searchDate) != '') {
            url += hasSearch ? '&date=' : '?date=';
            url += searchDate;
        }

        window.location.href = url;
    });
}
