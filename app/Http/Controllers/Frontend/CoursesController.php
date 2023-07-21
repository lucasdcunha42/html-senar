<?php

namespace App\Http\Controllers\Frontend;

use App\Agenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        // Obtém o ID da página de agendas (substitua o número 19 pelo ID correto)
        [$page, $blocos] = $this->getPageById(19);

        // Obtém todas as agendas com a situação 'Aprovado'
        $todosOsAgendas = \App\Agenda::where('situacao', 'Aprovado')->get();

        // Agrupa as agendas por data ou outro critério relevante, se necessário
        // $agendasGrouped = $todosOsAgendas->groupBy(function ($item, $key) {
        //     return $item->data_evento;
        // });

        // Obtém os primeiros 8 registros de agendas
        $agendas = $todosOsAgendas->take(8);

        // Obtém as áreas de interesse disponíveis para as agendas
        $areasDeInteresse = \DB::table('agendas')
                                ->select('area_de_interesse')
                                ->where('situacao', 'Aprovado')
                                ->whereNotNull('area_de_interesse')
                                ->distinct('area_de_interesse')
                                ->get();

        // Retorna a view "frontend.pages.agendas" com os dados obtidos
        return view('frontend.pages.agendas', compact('agendas', 'areasDeInteresse', 'page', 'blocos'));
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
        try {
            $request = request();

            // Obtém o valor de 'skip' (quantidade de agendas já exibidas) a partir do request
            $skip = $request->get('skip', 0);

            // Adicione um log para verificar o valor de $skip
            debugbar()->info('Valor de $skip:', $skip);

            // Define a quantidade de agendas a serem carregadas por vez
            $perPage = 8;

            // Constrói a consulta para obter mais agendas
            $query = Agenda::query();
            $query->where('situacao', 'Aprovado');

            // Se a área de interesse for selecionada, filtra por ela
            if (!empty($request->filled('interesse'))) {
                $query->where('area_de_interesse', $request->get('interesse'));
            }

            // Define o limite e a quantidade de registros a serem pulados
            $query->take($perPage)->skip($skip);

            // Obtém o SQL gerado pela consulta (para fins de debug, se necessário)
            $sql = $query->toSql();

            // Adicione um log para verificar o SQL gerado
            debugbar()->info('SQL:', $sql);

            // Executa a consulta para obter as agendas adicionais
            $agendas = $query->get();

            // Renderiza a view parcial 'frontend.pages.agenda-load-more' com as agendas adicionais
            $view = view('frontend.pages.agenda-load-more', compact('agendas'))->render();

            // Define se chegou ao final das agendas disponíveis
            $finish = false;
            if (!$agendas->count()) {
                $finish = true;
            }

            // Retorna a resposta JSON com a view parcial e o indicador de finalização
            return response()->json([
                'view' => $view,
                'finish' => $finish,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro na função loadMore: ' . $e->getMessage());
            // Outras ações de tratamento de erro, se necessário
        }
    }
}
