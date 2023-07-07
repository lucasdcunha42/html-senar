<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        [$page, $blocos] = $this->getPageById(19);

        $query = \App\Curso::orderBy('data_inicio', 'asc')
            ->sinceTomorrow('data_inicio')
            ->take(12);

        $perPage = 8;
        $total = $query->count();

        $cursos = $query->get();

        $startAutoLoadObject = json_encode([
            'perPage' => $perPage,
            'filters' => ['cursos-regiao', 'cursos-modalidade','cursos-cidade'],
            'total' => $total,
            'currentCount' => $cursos->count(),
            'urlAjax' => route('page.curso.loadMore')
        ]);

        // $todosOsCursos = \App\Curso::where('desc_fase_evento', 'Aprovado')->get();
        $todosOsCursos = \App\Curso::where('situacao', 'A')->get();

        $cursosGrouped = $todosOsCursos->groupBy(function($item, $key) {
            return strtoupper($item->titulo[0]);
        })
        ->sortBy(function($item, $key) {
            return $key;
        });

        $ordenacaoTextPattern = setting('geral.ordenacao-listagem-cursos');

        preg_match_all('/\[(.*?)\][\n\r]?/m', $ordenacaoTextPattern, $singlePatterns);

        $arrayCollumns = [];

        foreach($singlePatterns[1] as $result) {
            $result = str_replace(' ', '', $result);
            $arrayCollumns[] = explode(',', $result);
        }

        $finalArrayCollumns = [];

        foreach($arrayCollumns as $arrayOrder) {
            $orderedArray = [];
            foreach($arrayOrder as $key => $letter) {
                if(isset($cursosGrouped[strtoupper($letter)])) {
                    $orderedArray[strtoupper($letter)] = $cursosGrouped[strtoupper($letter)];
                } else {
                    // deleta a letra que não tem na collection
                    unset($arrayOrder[$key]);
                }
            }
            $finalArrayCollumns[] = $orderedArray;
        }

        // $cursos = \App\Curso::where('data_fim', '>=', now()->format('Y-m-d'))->get();
        // $cursos = \App\Curso::where('desc_fase_evento', 'Aprovado')


        if($request->input('s')){
            $cursos = \App\Curso::situacaoA()
                        ->take(12)
                        ->orderBy('data_inicio', 'desc')
                        ->where('titulo', "like", "%{$request->input('s')}%")
                        ->get();
        } else {
            $cursos = \App\Curso::situacaoA()
                            ->take(12)
                            ->orderBy('data_inicio', 'desc')
                            ->get();
        }

        $regiaoEvento = \DB::table('cursos')
                            ->where('situacao', 'A')
                            ->select('regiaoevento as regiao')
                            ->distinct('regiaoevento')
                            ->get();

        $areaInteresse = \DB::table('cursos')
                            ->select('areadeinteresse as interesse')
                            ->where('situacao', 'A')
                            ->where('areadeinteresse', '!=', null)
                            ->distinct('areadeinteresse')
                            ->get();

        $mesAno = \DB::table('cursos')
                    ->where('situacao', 'A')
                    ->select('data_inicio')
                    ->distinct('data_inicio')
                    ->get()
                    ->groupBy(function($val) {
                        return \Carbon\Carbon::createFromFormat('Y-m-d', $val->data_inicio)
                            ->format('Y/m');
                    });

        return view('frontend.pages.cursos', compact('cursos', 'regiaoEvento', 'areaInteresse', 'mesAno', 'page', 'blocos', 'finalArrayCollumns', 'cursosGrouped', 'startAutoLoadObject'));
    }

    public function single($slug)
    {
        $curso = \App\Curso::with('depoimentos')
                            ->where('situacao', 'A')
                            ->where('slug', $slug)
                            ->firstOrfail();

        return view('frontend.pages.cursos-single', compact('curso'));
    }


    public function loadMore()
    {
        $request = request();

        $perPage = $request->get('perPage');

        $currentCount = $request->get('currentCount');

        $query = \App\Curso::orderBy('data_inicio', 'asc')
            ->sinceTomorrow('data_inicio');

        if ($request->has('s')) {
            $query->where('s', $request->get('s'));
        }

        $total = $query->count();

        $query->take($perPage)
            ->skip($currentCount);

        $cursos = $query->get();

        $view = view('frontend.pages.curso.load.more', compact('cursos'))->render();

        return response()->json([
            'view' => $view,
            'currentCount' => $currentCount + $cursos->count(),
            'total' => $total
        ]);
    }

    /*
    public function loadMore(Request $request)
    {

        $skip = $request->get('skip', 0);

        $perPage = 8;

        $query = \App\Curso::query();
        $query->where('desc_fase_evento', 'Aprovado');


        if(!empty($request->input('s'))) {
            $query->orderBy('data_inicio', 'desc')
            ->where('titulo', "like", "%{$request->input('s')}%");
        }

        Filtros antigos do Load More
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

        $cursos = $query->get();

        $view = view('frontend.pages.cursos-item', compact('cursos'))->render();

        $finish = false;

        if(!$cursos->count()) {
            $finish = true;
        }

        return response()->json([
            'view' => $view,
            'finish' => $finish,
            // 'request' => $request->all(),
            // 'sql' => $sql
        ]);
    }
    */

}
