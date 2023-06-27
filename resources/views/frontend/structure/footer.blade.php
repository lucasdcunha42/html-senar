<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
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
            <div class="col-sm-12 col-md-5">
                <div class="footer-icons text-right">
                    {{-- <a href="https://www.cnabrasil.org.br/" target="_blank">
                        <img src="http://senar.allto.digital/storage/settings/June2021/x1zMeQn4FpcZ2QlyAughN.png.pagespeed.ic.7jZwNa_Lea.webp" alt="" data-pagespeed-url-hash="1125176109" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </a>
                    <a href="https://www.farsul.org.br/" target="_blank">
                        <img src="http://senar.allto.digital/storage/settings/June2021/xOna1sPRoj0ZZupXD5Apz.png.pagespeed.ic.NYsQEExYpP.webp" alt="" data-pagespeed-url-hash="2011897543" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </a>
                    <a href="http://fetagrs.org.br/" target="_blank">
                        <img src="http://senar.allto.digital/storage/settings/June2021/x10ZKnwJzHV1oPP2pBeVy.png.pagespeed.ic.D_yxU1yCes.webp" alt="" data-pagespeed-url-hash="3335550896" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </a>
                    <a href="http://www.casaruralrs.com.br/" target="_blank">
                        <img src="http://senar.allto.digital/storage/settings/June2021/xZv64QDKz40GM2rHF7dHA.png.pagespeed.ic.T7XsXATVSj.webp" alt="" data-pagespeed-url-hash="4081322457" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </a> --}}
                    @include('components.social-links')
                </div>
            </div>
        </div>
    </div>
</div>
