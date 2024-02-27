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
        $eventos = Evento::where('data_fim', '>=', today())
                        ->orderBy('data_inicio')
                        ->get();

        return view('voyager::atendimento.lista-eventos', ['eventos' => $eventos]);
    }

    public function showInscritos(Evento $evento) {

        $inscritos = $evento->inscritos;

         // Obtém os inscritos que compareceram
        $presentes = $evento->inscritos()
                    ->select('inscritos.nome', 'inscritos.cpf','inscritos.id')
                    ->wherePivot('presenca', 1)
                    ->orderBy('nome')
                    ->get();

        // Obtém os inscritos que estão ausentes
        $ausentes = $evento->inscritos()
                ->select('inscritos.nome', 'inscritos.cpf', 'inscritos.id')
                ->wherePivot('presenca', 0)
                ->orderBy('nome')
                ->get();

        // Obtém as cidades do evento
        $cidades = $evento->cidades();

        // Obtém os inscritos que não estão nem presentes nem ausentes
        $listaGeral = Inscrito::select('nome', 'cpf', 'id')
                ->whereDoesntHave('evento', function ($query) use ($evento) {
                    $query->where('evento_id', $evento->id);
                })
                ->get();


        return view('voyager::atendimento.lista-inscritos',
        [
            'inscritos' => $inscritos,
            'evento' => $evento,
            'presentes' => $presentes,
            'ausentes' => $ausentes,
            'cidades' => $cidades,
            'listaGeral' => $listaGeral,

        ]);
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

        // Verifica se o inscrito está cadastrado no evento
        if (!$evento->inscritos->contains($inscrito)) {
            $evento->inscritos()->attach($inscrito->id, ['presenca' => 1]);

            return redirect()->back()->with('success', $inscrito->nome . ' inscrito e presente no evento!');
        }

        $evento->inscritos()->updateExistingPivot($inscrito->id, ['presenca' => 1]);

        // Redirecione de volta para onde quer que seja apropriado
        return redirect()->back()->with('success', $inscrito->nome . ' presente no Evento!');
    }

    public function getData(){

    }
}
