<?php

namespace App\Http\View\Composers;

use App\Agenda;
use Illuminate\View\View;

class AgendaComposer
{

    protected $agendas;

    public function __construct()
    {
        $this->agendas = Agenda::orderBy('data_inicio', 'desc')
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
        $view->with('composeAgenda', $this->agendas);
    }
}
