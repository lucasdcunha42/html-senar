if($('.buttons-eventos').length) {

    var _buttons = $('.buttons-eventos [data-type]');
    var _eventosItems = $('.evento-item');

    function changeItems() {
        var arr = [];
        _buttons.each(function(index, el) {
            if($(el).hasClass('active')) {
                arr.push($(el).data('type'));
            }
        });

        _eventosItems.each(function(index, el) {
            var _fn = arr.indexOf($(el).data('type')) > -1 ? 'show' : 'hide';
            $(el)[_fn]('fast');
        });
    }

    _buttons.on('click', function() {
        $(this).toggleClass('active');

        if(!$('.buttons-eventos [data-type].active').length) {
            _eventosItems.show('fast');
            return false;
        }

        changeItems();
    });
}

if($('#form-evento-incricao').length){

    $('#cpf').mask('000.000.000-00', {reverse: true});

    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
        }
    };
    $('#telefone').mask(maskBehavior, options);

    $('form').on('submit', function(){
        $('#cpf').unmask();
        $('#telefone').unmask();
    });
}

if($('.evento-single').length){

    // Função para ajustar as imagens dentro das tags <p>
    function ajustarImagens() {
      // Seleciona todas as tags <p> no documento
      var paragrafos = document.querySelectorAll('p');

      // Itera sobre cada tag <p>
      paragrafos.forEach(function(paragrafo) {
        // Verifica se o parágrafo contém uma tag <img>
        var imagem = paragrafo.querySelector('img');

        // Se existir uma tag <img> no parágrafo, ajusta seus atributos
        if (imagem) {
          imagem.style.maxWidth = '1200px';
          imagem.style.width = '100%';
          imagem.style.height = 'auto';
        }
      });
    }

    // Chama a função quando a página for totalmente carregada
    window.onload = ajustarImagens;
}

