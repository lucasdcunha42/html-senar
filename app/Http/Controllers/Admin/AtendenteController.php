<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Evento;
use Illuminate\Http\Request;

class AtendenteController extends Controller
{
    public function listaEventos(){
        $eventos = Evento::all();

        return view('atendimento.lista-eventos', ['eventos' => $eventos]);
    }
}
