<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Evento;
use App\EventosInscrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendenteController extends Controller
{
    public function listaEventos(){
        $eventos = Evento::all();

        return view('atendimento.lista-eventos', ['eventos' => $eventos]);
    }

    public function showInscritos(Evento $evento) {

        $inscritos = $evento->inscritos;

        ddd($inscritos);

        // Obtém os inscritos que compareceram
        $compareceram = EventosInscrito::where('presenca', 1)->get();

        // Obtém os inscritos que estão ausentes
        $ausentes = EventosInscrito::where('presenca', 0)->get();

        return view('atendimento.lista-inscritos', ['inscritos' => $inscritos, 'evento' => $evento, 'compareceram' => $compareceram, 'ausentes' => $ausentes]);
    }
}
