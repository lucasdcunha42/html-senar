$(document).ready(function(){
    function fetch_data(page, query){
        $.ajax({
            url:"?page="+page+"&query="+query,
            success:function(data){
                $('#cursos-container').html('');
                $('#cursos-container').html(data);
            }
        })
    }

    $('#search-form').submit(function(event){
        event.preventDefault();
        var query = $('#search').val();
        var page = $('#hidden_page').val();
        fetch_data(page, query);
    });

    $('body').on('click', '.pager a', function(event){
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var query = $('#search').val();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        fetch_data(page, query);
    });
});
