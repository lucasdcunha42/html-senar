<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class InstitucionalController extends Controller
{
    public function oSenar()
    {
        [$page, $blocos] = $this->getPageById(2);

        $objetivos = \App\Objetivo::orderBy('ordem', 'asc')->get();

        $depoimentos = \App\Depoimento::where('status', 1)->get();

        $estrutura = $blocos->getBloco('sessa-estrutura-organizacional');
        $video = $blocos->getBloco('id-video-o-senar');
        $blocoBgDepoimentos = $blocos->getBloco('bg-depoimentos');

        $vars = [
            'page',
            'blocos',
            'objetivos',
            'depoimentos',
            'estrutura',
            'video',
            'blocoBgDepoimentos'
        ];

        return view('frontend.pages.institucional.o-senar', compact($vars));
    }

    public function legislacao()
    {
        [$page, $blocos] = $this->getPageById(14);

        $legislacaoCategorias = \App\LegislacoesCategoria::with([
            'legislacoes' => function ($query) {
                $query->where('status', 1);
                $query->orderBy('created_at', 'desc');
                $query->orderBy('id', 'desc');
            }
        ])
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.institucional.legislacao', compact('page', 'blocos', 'legislacaoCategorias'));
    }

    public function atividades()
    {
        [$page, $blocos] = $this->getPageById(21);

        $query = \App\RelatoriosAtvidadesCategoria::query();

        $query->whereHas('relatorios', function ($q) {
            $q->where('status', 1);
        });
        $query->with(['relatorios' => function ($q) {
            $q->where('status', 1);
            $q->orderBy('titulo', 'desc');
        }]);

        $relatorioscategoria = $query->get();

        return view('frontend.pages.institucional.atividades', compact('relatorioscategoria', 'page', 'blocos'));
    }

    public function contribuicaoPrevidenciaRural()
    {
        [$page, $blocos] = $this->getPageById(2);

        $blade = 'frontend.pages.institucional.contribuicao-previdencia-rural';

        $query = \App\ContribuicoesPrevidenciaRuralCategoria::query();
        $query->with(['contribuicoes' => function ($q) {
            $q->where('status', 1);
        }]);
        $query->where('status', 1);

        $contribuicoesCategoria = $query->get();

        return view($blade, compact('page', 'blocos', 'contribuicoesCategoria'));
    }

    public function licitacoesEContrato()
    {
        [$page, $blocos] = $this->getPageById(3);

        $licitacoes = \App\Licitacao::orderBy('data_abertura', 'desc')
            ->orderBy('status', 'desc')
            ->get()->groupBy('status');

        $all = [];
        $all['PROCESSOS LICITÁRIOS EM ANDAMENTO'] = $licitacoes[1] ?? collect([]);
        $all['PROCESSOS LICITÁRIOS CONCLUÍDOS'] = $licitacoes[0] ?? collect([]);

        $vars = [
            'page',
            'blocos',
            'licitacoes',
            'all',
        ];

        return view('frontend.pages.institucional.licitacoes-e-contrato', compact($vars));
    }
}
