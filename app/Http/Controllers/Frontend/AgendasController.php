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

        $cidades = Agenda::distinct()->orderBy('nome_municipio')->pluck('nome_municipio');

        $agendas = Agenda::whereHas('curso')
            ->orderBy('data_inicio','asc')
            ->take(8)
            ->get();

        $vars = ['page', 'blocos', 'agendas', 'cidades'];

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
        debugbar()->info($request->request);

        $skip = $request->get('skip', 0);
        debugbar()->info('Valor de $skip:'. $skip);

        $perPage = 8;

        $query = Agenda::query();
        $query->where('desc_fase_evento', 'Aprovado');
        debugbar()->info('Query:', $query);

        if(!empty($request->filled('cidade'))) {
            $query->where('nome_municipio', $request->get('cidade'));
        }

        if(!empty($request->filled('titulo'))) {
            $query->where('nome_curso', 'like', "%$request->titulo%");
        }

        if(!empty($request->has('datas'))) {
            $date = request()->get('datas');
            $explodedDate = explode('-', $date);
            if(count($explodedDate) == 2) {
                $initialDate = \Carbon\Carbon::createFromFormat('d/m/Y', trim($explodedDate[0]))->startOfDay();
                $finalDate = \Carbon\Carbon::createFromFormat('d/m/Y', trim($explodedDate[1]))->endOfDay();

                $query->whereBetween('created_at', [$initialDate, $finalDate]);
            }
        }

        $query->take($perPage)->skip($skip)->orderBy('data_inicio', 'ASC');

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
