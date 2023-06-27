<?php

namespace App\Http\View\Composers;

use App\ContatosAssunto;
use Illuminate\View\View;

class FormAssuntoComposer
{

    protected $assuntos;

    public function __construct()
    {
        $this->assuntos = ContatosAssunto::select(['id', 'assunto'])
                                            ->orderBy('assunto')
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
        $view->with('__assuntos', $this->assuntos);
    }
}
