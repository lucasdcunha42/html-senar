<!-- Mensagem de Aceite de Cookies -->
<div id="cookie-banner" class="cookie-banner">
    <div class="cookie-content">
        <div class="cookie-buttons">
            {{-- Adicione um formulário para permitir que os usuários personalizem suas preferências de cookies --}}
            <form action="{{ config('eu-cookie-consent.route') }}" method="POST" id="eu-cookie-consent-form">
                <div style="width: 100%;">
                    @foreach($config['categories'] as $categoryName => $category)
                        @include('eu-cookie-consent::category')
                    @endforeach
                </div>
                <div style="margin-top: 20px;">
                    @if(config('eu-cookie-consent.acceptAllButton'))
                        <a class="eu-popup-button" onclick="euCookieConsentSetCheckboxesByClassName('eu-cookie-consent-cookie');">
                            @if($multiLanguageSupport)
                                {{__('eu-cookie-consent::cookies.acceptAllButton')}}
                            @else
                                {{ $config['acceptAllButton'] }}
                            @endif
                        </a>
                    @endif
                    <button id="saveButton" type="submit" class="eu-popup-button">
                        @if($multiLanguageSupport)
                            {{__('eu-cookie-consent::cookies.save')}}
                        @else
                            {{ $config['saveButton'] }}
                        @endif
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function euCookieConsentSetCheckboxesByClassName(classname) {
        checkboxes = document.getElementsByClassName('eu-cookie-consent-cookie');
        for (i = 0; i < checkboxes.length; i++) {
            checkboxes[i].setAttribute('checked', 'checked');
            checkboxes[i].checked = true;
        }
        document.getElementById("eu-cookie-consent-form").requestSubmit();
    }
</script>
