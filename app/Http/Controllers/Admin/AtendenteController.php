<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Evento;
use App\EventosInscrito;
use App\Inscrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendenteController extends Controller
{
    public function listaEventos(){
        $eventos = Evento::all();

        return view('voyager::atendimento.lista-eventos', ['eventos' => $eventos]);
    }

    public function showInscritos(Evento $evento) {

        $inscritos = $evento->inscritos;

        // Obtém os inscritos que compareceram
        $presentes = DB::table('inscritos')
            ->select('inscritos.*', 'eventos_inscritos.evento_id as pivot_evento_id', 'eventos_inscritos.inscrito_id as pivot_inscrito_id', 'eventos_inscritos.presenca as pivot_presenca')
            ->join('eventos_inscritos', 'inscritos.id', '=', 'eventos_inscritos.inscrito_id')
            ->where('eventos_inscritos.evento_id', '=', $evento->id)
            ->where('eventos_inscritos.presenca', '=', 1)
            ->orderBy('nome')
            ->get();

        // Obtém os inscritos que estão ausentes
        $ausentes = DB::table('inscritos')
            ->select('inscritos.*', 'eventos_inscritos.evento_id as pivot_evento_id', 'eventos_inscritos.inscrito_id as pivot_inscrito_id', 'eventos_inscritos.presenca as pivot_presenca')
            ->join('eventos_inscritos', 'inscritos.id', '=', 'eventos_inscritos.inscrito_id')
            ->where('eventos_inscritos.evento_id', '=', $evento->id)
            ->where('eventos_inscritos.presenca', '=', 0)
            ->orderBy('nome')
            ->get();

        return view('voyager::atendimento.lista-inscritos', ['inscritos' => $inscritos, 'evento' => $evento, 'presentes' => $presentes, 'ausentes' => $ausentes]);
    }
}
