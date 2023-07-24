<?php

namespace App\Http\Controllers\Frontend;

use App\Curso;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        [$page, $blocos] = $this->getPageById(19);

        $cursos = Curso::situacaoA()
                            ->take(8)
                            ->get();

        $areaInteresse = Curso::select('areadeinteresse as interesse')
                            ->where('situacao', 'A')
                            ->where('areadeinteresse', '!=', null)
                            ->distinct('areadeinteresse')
                            ->get();

        return view('frontend.pages.cursos', compact('cursos', 'areaInteresse', 'page', 'blocos'));
    }

    public function single($slug)
    {
        $curso = Curso::with('depoimentos')
                            ->where('situacao', 'A')
                            ->where('slug', $slug)
                            ->firstOrfail();

        return view('frontend.pages.cursos-single', compact('curso'));
    }

    public function loadMore()
    {
            $request = request();
            debugbar()->info('Request:', $request);

            $skip = $request->get('skip', 0);
            debugbar()->info('Skip:', $skip);

            $perPage = 8;

            $query = Curso::query()->where('situacao', 'A');
            debugbar()->info('Query:', $query);

            if(!empty($request->filled('interesse'))) {
                $query->where('areadeinteresse', $request->get('interesse'));
            }

            $query->take($perPage)->skip($skip);

            $sql = $query->toSql();
            debugbar()->info('SQL:', $sql);

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
}
