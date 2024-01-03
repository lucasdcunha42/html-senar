$(function() {
    $('#nome_curso').on('change', function() {
        // Obter o valor do elemento 'nome_curso' após a mudança.
        var searchTerm = $(this).val();

        // Chamar a função getCursos com o termo de busca.
        getCursos(searchTerm);
    });

    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        getCursosWithPagination(url);
        window.history.pushState("", "", url);
    });

    function getCursos(searchTerm) {
        $.ajax({
            url: '/cursos',
            method: 'GET',
            data: { q: searchTerm },
        }).done(function(data) {
            $('.cursos-container').html(data);
        }).fail(function() {
            alert('Cursos could not be loaded.');
        });
    }

    function getCursosWithPagination(url) {
        $.ajax({
            url: url,
            method: 'GET',
        }).done(function(data) {
            $('.cursos-container').html(data);
        }).fail(function() {
            alert('Cursos could not be loaded.');
        });
    }
});
