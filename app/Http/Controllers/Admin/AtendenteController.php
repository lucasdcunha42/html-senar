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

        $cidades = $evento->cidades();

        return view('voyager::atendimento.lista-inscritos', ['inscritos' => $inscritos, 'evento' => $evento, 'presentes' => $presentes, 'ausentes' => $ausentes, 'cidades' => $cidades]);
    }

    public function store(Request $request) {

        $evento = Evento::findOrFail($request->evento_id);

        $inscrito = Inscrito::where('cpf', $request->input('cpf'))->first();

        if ($evento->inscritos->contains($inscrito)) {
            return redirect()->back()->with('error', 'Participante ja Cadastrado no evento neste evento.');
        }

        $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|numeric|digits:11',
            'email' => 'nullable|email',
            'cidade' => 'required',
            'atividade' => 'nullable',
            'telefone' => 'nullable|numeric',
            'evento_id' => 'required|exists:eventos,id', // Verifica se o evento existe
        ]);

        if (!$inscrito) {
            // Cria um novo inscrito com somente os dados validados laravel 5.6
            $inscrito = new Inscrito();
            $inscrito->nome = $request->nome;
            $inscrito->cpf = $request->cpf;
            $inscrito->email = $request->email;
            $inscrito->cidade = $request->cidade;
            $inscrito->atividade = $request->atividade;
            $inscrito->telefone = $request->telefone;

            $inscrito->save();
        }

        // Anexe o inscrito ao evento
        $evento->inscritos()->attach($inscrito->id, ['presenca' => 1]);

        // Redirecione de volta para a página do evento ou para onde for apropriado
        return redirect()->back()->with('success', $inscrito->nome . ' adicionado com sucesso!');
    }

    public function presenca(Request $request, Evento $evento, Inscrito $inscrito) {
        $evento->inscritos()->updateExistingPivot($inscrito->id, ['presenca' => 1]);

        // Redirecione de volta para onde quer que seja apropriado
        return redirect()->back()->with('success', $inscrito->nome . ' presente no Evento!');
    }
}
