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

        $cursos = Curso::query()->situacaoA();

        if ($request->q) {
            $cursos->where('nome_curso', 'like', "%$request->q%");
        }

        if ($request->ajax()) {

            if ($request->q) {
                $cursos->where('nome_curso', 'like', "%$request->q%");
            }

            $cursos = $cursos->paginate(8)->withQueryString();

            return view('frontend.pages.cursos-item', ['cursos' => $cursos])->render();
        }

        $cursos = $cursos->paginate(8)->withQueryString();

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
}
