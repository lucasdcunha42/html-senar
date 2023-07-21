<?php

namespace App\Http\Controllers\Frontend;

use App\Agenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendasController extends Controller
{
    public function agenda()
    {
        [$page, $blocos] = $this->getPageById(17);

        $query = Agenda::orderBy('data_inicio', 'asc')
            ->sinceTomorrow('data_inicio')
            ->take(12);

        $perPage = 8;
        $total = $query->count();

        $agendaInicial = $query->get();

        $startAutoLoadObject = json_encode([
            'perPage' => $perPage,
            'filters' => ['cursos-regiao', 'cursos-modalidade','cursos-cidade'],
            'total' => $total,
            'currentCount' => $agendaInicial->count(),
            'urlAjax' => route('page.agenda.loadMore')
        ]);

        $regioes = $agendaInicial->groupBy('regiaoevento');
        $modalidades = $agendaInicial->groupBy('modalidade');
        $cidades = Agenda::distinct()->orderBy('nome_municipio')->pluck('nome_municipio');

        $agendas = Agenda::whereHas('curso')
            ->with('curso','municipio.sindicato')
            ->orderBy('data_inicio','asc')
            ->get();

        $vars = ['page', 'blocos', 'agendaInicial', 'regioes', 'agendas', 'modalidades','cidades', 'total', 'startAutoLoadObject'];

        return view('frontend.pages.agenda', compact($vars));
    }

    public function single($slug)
    {
        $agenda = Agenda::whereHas('curso')
                            ->with('curso','curso.depoimentos', 'municipio.sindicato')
                            ->orderBy('id')
                            ->where('slug', $slug)
                            ->firstOrfail();

        return view('frontend.pages.agenda-single', compact('agenda'));
    }

    public function loadMore()
    {
        $request = request();

        $skip = $request->get('skip', 0);
        debugbar()->info('Valor de $skip:', $skip);

        $perPage = 8;

        $query = Agenda::query();
        $query->where('desc_fase_evento', 'Aprovado');

        if(!empty($request->filled('interesse'))) {
            $query->where('areadeinteresse', $request->get('interesse'));
        }

        if(!empty($request->filled('regiao'))) {
            $query->where('regiaoevento', $request->get('regiao'));
        }

        if(!empty($request->filled('anoMes'))) {
            $anoMes = explode('/', $request->get('anoMes'));
            $query->whereYear('data_inicio', $anoMes[0]);
            $query->whereMonth('data_inicio', $anoMes[1]);
        }

        $query->take($perPage)->skip($skip)->orderBy('data_inicio', 'desc');

        $sql = $query->toSql();

        $agendas = $query->get();

        $view = view('frontend.components.c-thumb-4.blade', compact('agendas'))->render();

        $finish = false;
        if(!$agendas->count()) {
            $finish = true;
        }

        return response()->json([
            'view' => $view,
            'finish' => $finish,
            // 'request' => $request->all(),
            // 'sql' => $sql
        ]);
    }
}
