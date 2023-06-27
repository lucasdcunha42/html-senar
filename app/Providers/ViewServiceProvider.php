<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'frontend.partials.agenda', 'App\Http\View\Composers\AgendaComposer'
        );

        View::composer(
            'components.banner-carousel', 'App\Http\View\Composers\BannerCarouselComposer'
        );

        View::composer(
            'frontend.forms.select-assunto', 'App\Http\View\Composers\FormAssuntoComposer'
        );
    }
}
