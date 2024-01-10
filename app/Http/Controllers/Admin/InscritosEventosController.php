<?php

namespace App\Http\Controllers\Admin;

use App\Evento;
use App\Http\Controllers\Controller;
use App\Inscrito;
use Illuminate\Http\Request;

class InscritosEventosController extends Controller
{
    public function removeInscritoEvento($idEvento, $idInscrito) {

        //$this->authorize('add', app($dataType->model_name));

        //Recupere o evento pelo ID
        $evento = Evento::findOrFail($idEvento);

        // Remova o inscrito pelo ID utilizando o método detach
        $evento->inscritos()->detach($idInscrito);

        // Redirecione de volta à página ou faça qualquer outra coisa necessária
        return redirect()->back()->with('success', 'Inscrito removido do evento com sucesso.');
    }

    public function formulario($eventoId)
    {
        // Lógica para exibir o formulário de inscrição
        return view('inscricao.formulario', ['eventoId' => $eventoId]);
    }

    public function adicionarInscrito(Request $request)
    {
        // Lógica para adicionar o inscrito ao evento
        $eventoId = $request->input('evento_id');
        // Adicione outros campos conforme necessário

        // Exemplo de criação de um novo inscrito (substitua pelo seu código real)
        $inscrito = Inscrito::create([
            'nome' => $request->input('nome'),
            // Adicione outros campos conforme necessário
        ]);

        // Adicione o inscrito ao evento
        $evento = Evento::findOrFail($eventoId);
        $evento->inscritos()->attach($inscrito->id);

        // Redirecione ou faça qualquer outra coisa necessária
        return redirect()->route('lista.inscritos.show', ['event' => $eventoId])->with('success', 'Inscrito adicionado com sucesso.');
    }
}
