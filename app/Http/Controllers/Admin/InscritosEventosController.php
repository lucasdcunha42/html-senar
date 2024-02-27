<?php

namespace App\Http\Controllers\Admin;

use App\Evento;
use App\Http\Controllers\Controller;
use App\Inscrito;
use App\SindicatosMunicipio;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel as FastExcelFastExcel;

class InscritosEventosController extends Controller
{
    public function removeInscritoEvento(Evento $evento, Inscrito $inscrito) {

        //$this->authorize('add', app($dataType->model_name));
        $evento->inscritos()->detach($inscrito->id);

        return redirect()->back()->with('success', 'Inscrito removido do evento com sucesso.');
    }

    public function formulario($eventoId)
    {
        $evento = Evento::findOrFail($eventoId);
        $cidades = SindicatosMunicipio::orderBy('municipio')->pluck('municipio','id');

        // talvez precise da logica de permissão;
        return view('frontend.forms.inscricao-evento', ['evento' => $evento, 'cidades' => $cidades ]);
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

        $data = [
            'inscrito' => $inscrito->nome,
            'evento' => $evento->titulo,
        ];

        $cracha = Pdf::loadView('pdf.cracha', ['data' => $data])->setPaper('a6', 'portrait');

        return $cracha->stream('cracha.pdf');
    }

    public function ImprimeCertificado(Evento $evento, Inscrito $inscrito){
        ddd($evento, $inscrito);
    }

    public function exportaRelatorio(Evento $evento) {

        $data = $evento->inscritos()
        ->select('inscritos.nome', 'inscritos.cpf','inscritos.atividade', 'inscritos.cidade','inscritos.email', 'inscritos.telefone', DB::raw("DATE_FORMAT(eventos_inscritos.created_at, '%d/%m/%Y') AS inscrito_em"))
        ->wherePivot('presenca', 1)
        ->orderBy('nome')
        ->get();

        return (new FastExcelFastExcel($data))->download( $evento->titulo . '.xlsx');
    }
}
