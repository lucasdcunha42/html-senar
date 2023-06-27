<?php

namespace App\Http\View\Composers;

use App\Banner;
use Illuminate\View\View;

class BannerCarouselComposer
{

    protected $banners;

    public function __construct()
    {
        $this->banners = Banner::where('status', 1)->orderBy('ordem', 'asc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('__banners', $this->banners);
    }
}
