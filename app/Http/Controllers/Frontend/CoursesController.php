<?php

namespace App\Http\Controllers\Frontend;

use App\Agenda;
use App\Curso;
use App\Http\Controllers\Controller;
use App\SearchLog;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        // Obtém o ID da página de agendas (substitua o número 19 pelo ID correto)
        [$page, $blocos] = $this->getPageById(19);

        $cursos = Curso::situacaoA()
                        ->take(8);


        if($request->nome_curso) {
            $cursos->where('nome_curso', 'like', "%$request->nome_curso%");
        }

        $cursos = $cursos->get();

        return view('frontend.pages.cursos', compact('cursos', 'page', 'blocos'));

    }

    public function single($slug)
    {
        $curso = Curso::with('depoimentos')
                        ->where('situacao', 'A')
                        ->where('slug', $slug)
                        ->firstOrfail();

        $proximasAgendas = Agenda::where('desc_fase_evento', 'Aprovado')
                                    ->sinceTomorrow('data_inicio')
                                    ->orderBy('data_inicio', 'asc')
                                    ->where('cod_curso', $curso->cod_curso)
                                    ->take(4)
                                    ->get();

        return view('frontend.pages.cursos-single', compact('curso', 'proximasAgendas'));
    }

    public function loadMore()
    {
            $request = request();

            $skip = $request->get('skip', 0);

            $perPage = 8;

            $query = Curso::query()->where('situacao', 'A');
            //debugbar()->info('Query:', $query);

            if(!empty($request->filled('nome'))) {
                $searchQuery = $request->input('nome'); // Obtenha a consulta de pesquisa
                $path = $request->path();
                $response = response()->json(['message' => 'Seu conteúdo aqui'], 200);
                $status = $response->status();
                $query->where('nome_curso', 'like', "%$request->nome%");

                SearchLog::registerSearch($searchQuery, $path, $status);
            }

            $query->take($perPage)->skip($skip);

            $sql = $query->toSql();
            //debugbar()->info('SQL:', $sql);

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
