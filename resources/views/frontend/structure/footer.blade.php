<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-sm-5">
                        <a href="{{ route('page.home') }}">
                            <img
                            src="{{ asset('storage/' . setting('site.logo-footer')) }}"
                            class="img-responsive center-on-xs logo-footer"
                            alt="">
                        </a>
                    </div>
                    <div class="col-sm-7">
                        <div class="address">
                            <p>Praça Prof Saint - Pastous, 125</p>
                            <p>Cidade Baixa - Porto Alegre - RS</p>
                            <p>90050-390</p>
                            <p><b>51 3215 7500</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="row center">

                    <div class="col-sm-6 text-center">
                        <a href="{{ route('page.home') }}">
                            <img
                            style="max-width: 140px"
                            src="{{ asset('storage/' . setting('site.selo')) }}"
                            class="img-responsive center-on-xs"
                            alt="">
                        </a>
                    </div>

                        <div class="col-sm-6">
                            <div class="footer-icons">
                                @include('components.social-links')
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
