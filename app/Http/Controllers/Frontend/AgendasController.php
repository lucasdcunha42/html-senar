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

        $regioes = Agenda::select('regiaoevento as regiao')
                    ->where('desc_fase_evento', 'Aprovado')
                    ->where('regiaoevento', '!=', null)
                    ->distinct('regiaoevento')
                    ->get();

        $cidades = Agenda::distinct()->orderBy('nome_municipio')->pluck('nome_municipio');

        $agendas = Agenda::whereHas('curso')
            ->orderBy('data_inicio','asc')
            ->take(8)
            ->get();

        $vars = ['page', 'blocos', 'agendas', 'regioes', 'cidades'];

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

        debugbar()->info($request);

        $skip = $request->get('skip', 0);
        debugbar()->info('Valor de $skip:', $skip);

        $perPage = 8;

        $query = Agenda::query();
        $query->where('desc_fase_evento', 'Aprovado');
        debugbar()->info('Query:', $query);

        if(!empty($request->filled('regiao'))) {
            $query->where('regiaoevento', $request->get('regiao'));
        }

        $query->take($perPage)->skip($skip)->orderBy('data_inicio', 'desc');

        $sql = $query->toSql();

        $agendas = $query->get();

        $view = view('frontend.pages.agendas-item', compact('agendas'))->render();

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
