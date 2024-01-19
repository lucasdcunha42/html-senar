<?php

namespace App\Http\Controllers\Admin;

use App\Evento;
use App\Http\Controllers\Controller;
use App\Inscrito;
use Illuminate\Http\Request;

class InscritosEventosController extends Controller
{
    public function removeInscritoEvento(Evento $evento, Inscrito $inscrito) {

        //$this->authorize('add', app($dataType->model_name));
        $evento->inscritos()->detach($inscrito->id);

        return redirect()->back()->with('success', 'Inscrito removido do evento com sucesso.');
    }

    public function formulario($eventoId)
    {
        ddd($eventoId);

        // talvez precise da logica de permissão;
        return view('frontend.forms.inscricao-evento', ['eventoId' => $eventoId]);
    }

    public function adicionaInscrito(Request $request)
    {
        //Lógica para adicionar o inscrito ao evento
        $eventoId = $request->input('evento_id');
        $inscrito = Inscrito::create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'email' => $request->input('email'),
            'cidade' => $request->input('cidade'),
            'atividade' => $request->input('atividade'),
        ]);

        $evento = Evento::findOrFail($eventoId);
        $evento->inscritos()->attach($inscrito->id);

        return redirect()->route('lista.inscritos.index', ['event' => $eventoId])->with('success', 'Inscrito adicionado com sucesso.');
    }

    public function bulkDetachInscritos(Request $request, Evento $evento)
    {
        ddd($request->input(), $evento);
    }

    public function imprimeCracha(Evento $evento, Inscrito $inscrito){

        ddd($evento, $inscrito);
    }

    public function ImprimeCertificado(Evento $evento, Inscrito $inscrito){
        ddd($evento, $inscrito);
    }
}
