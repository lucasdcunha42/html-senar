<?php

namespace App\Http\View\Composers;

use App\Banner;
use Illuminate\View\View;

class AgendaComposer
{

    protected $cursos;

    public function __construct()
    {
        $this->cursos = \App\Curso::orderBy('data_inicio', 'desc')
                            ->take(4)
                            ->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('__cursos', $this->cursos);
    }
}
