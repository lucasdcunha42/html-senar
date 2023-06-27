require('./bootstrap');
require('./helpers');
require('./hamburger');
require('./accordion');
require('./side-menu');
require('./state-city-select');
require('./regioes');
require('./action-button');
require('./forms');
require('./scroll');
require('./sindicatos');
require('./agenda');
require('./cursos');
require('./eventos');
require('./noticias');

var slickConfig = {
    adaptiveHeight: true,
    autoplay: false
};

if($('.html').length) {
    $('.html img').addClass('img-responsive');
}

$('.depoimentos-carousel').slick(slickConfig);

if($('a[data-rel^=lightcase]').length) {
    var lightCaseConfig = {
        'errorMessage': 'Arquivo não encontrado...',
        'sequenceInfo.of': ' de ',
        'close': 'Fechar',
        'navigator.prev': 'Anterior',
        'navigator.next': 'Próxima',
        'navigator.play': 'Play',
        'navigator.pause': 'Pause',
        'swipe': true
    };

    $('a[data-rel^=lightcase]').lightcase(lightCaseConfig);
}

if($('[data-link]').length) {
    $('[data-link]').css('cursor', 'pointer').on('click', function() {
        window.open($(this).data('link'), '_blank').focus();
    });
}


// animacao da busca da agenda
var buttonsBusca = $('.buttons-animated button');
var line = $('.line-indicator').first();

function goLine() {

    var el = $('button.active span');

    if(!el.length) {
        return false;
    }

    var css = {
        'width' : el.width() + 40 + 'px',
        'left' : el.position().left - 20
    };

    line.css(css);
}

goLine();

buttonsBusca.on('click', function(e) {
    buttonsBusca.removeClass('active');
    $(this).addClass('active');
    goLine();
});

// console.log(currentSpan.width(), currentSpan.position().left);
