<?php

namespace App\Http\Controllers\Frontend;

use App\Agenda;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function agenda()
    {
        [$page, $blocos] = $this->getPageById(17);

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
            'urlAjax' => route('page.agenda.loadMore')
        ]);

        $regioes = $cursos->groupBy('regiaoevento');
        $modalidades = $cursos->groupBy('modalidade');
        $cidades = \App\Curso::distinct()->orderBy('cidade')->pluck('cidade');

        $agendas = Agenda::whereHas('curso')
            ->with('curso','municipio.sindicato')
            ->orderBy('data_inicio','asc')
            ->get();

        $vars = ['page', 'blocos', 'cursos', 'regioes', 'agendas', 'modalidades','cidades', 'total', 'startAutoLoadObject'];

        return view('frontend.pages.agenda', compact($vars));
    }

    public function loadMore()
    {
        $request = request();

        $perPage = $request->get('perPage');

        $currentCount = $request->get('currentCount');


        $query = \App\Curso::orderBy('data_inicio', 'asc')
            ->sinceTomorrow('data_inicio');

        if ($request->has('cursos-regiao')) {
            $query->where('regiaoevento', $request->get('cursos-regiao'));
        }

        if ($request->has('cursos-modalidade')) {
            $query->where('modalidade', $request->get('cursos-modalidade'));
        }

        $total = $query->count();

        $query->take($perPage)
            ->skip($currentCount);

        $cursos = $query->get();

        $view = view('frontend.pages.agenda-load-more', compact('cursos'))->render();

        return response()->json([
            'view' => $view,
            'currentCount' => $currentCount + $cursos->count(),
            'total' => $total
        ]);
    }

    public function eventos()
    {
        [$page, $blocos] = $this->getPageById(20);

        $eventos = \App\Evento::inComming()->active()->orderBy('data_inicio', 'asc')->get();

        $tipos = \App\Evento::getTipos();

        return view('frontend.pages.eventos', compact('page', 'blocos', 'eventos', 'tipos'));
    }

    public function sindicatos()
    {
        [$page, $blocos] = $this->getPageById(16);

        $municipios = \App\SindicatosMunicipio::whereHas('sindicato')
            ->with('sindicato')
            ->orderBy('municipio', 'ASC')
            ->get();

        // dd($municipios->where('municipio', 'MONTE BELO DO SUL'));

        $sindicatos = \App\Sindicato::whereHas('municipios')->with('municipios')->get();

        return view('frontend.pages.sindicatos', compact('page', 'blocos', 'municipios', 'sindicatos'));
    }

    public function transparencia()
    {
        [$page, $blocos] = $this->getPageById(13);

        $transparencias = \App\Tranparencia::with('arquivos')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.pages.transparencia', compact('page', 'blocos', 'transparencias'));
    }

    public function transparenciaDownload($id)
    {
        $transparenciaArquivo = \App\TranparenciasArquivo::findOrfail($id);
        $arquivos = json_decode($transparenciaArquivo->arquivo);
        $zipFile = storage_path('app/public/') . \Str::slug($transparenciaArquivo->titulo) . '.zip';
        $filesPath = "";

        foreach ($arquivos as $file) {
            $filesPath .= " " . storage_path('app/public/' . $file->download_link);
        }

        $filesPath = str_replace("\\", "/", $filesPath);

        if (file_exists($zipFile)) {
            $command = "rm -rf " . $zipFile;
            shell_exec($command);
        }

        $command = "zip -j " . $zipFile . $filesPath;
        shell_exec($command);

        if (!file_exists($zipFile)) {
            $command = "zip -j " . $zipFile . ' ' . storage_path('app/public/sem_anexos_para_o_registro_solicitado.txt');
            shell_exec($command);
        }

        return response()->download($zipFile);
    }

    public function contato()
    {
        [$page, $blocos] = $this->getPageById(9);

        return view('frontend.pages.contato', compact('page', 'blocos'));
    }

    public function supervisao()
    {
        [$page, $blocos] = $this->getPageById(12);

        $supervisoes = \App\Regiao::all()->groupBy('regiao');

        return view('frontend.pages.supervisao', compact('page', 'blocos', 'supervisoes'));
    }

    public function apoiadores()
    {
        [$page, $blocos] = $this->getPageById(10);

        $apoiadores = \App\Apoiador::orderBy('created_at', 'desc')->get();

        $regras = $blocos->getBloco('regras-apoiadores');
        $patrocinador = $blocos->getBloco('patrocinador-apoiadores');

        $vars = ['page', 'blocos', 'apoiadores', 'regras', 'patrocinador'];

        return view('frontend.pages.apoiadores', compact($vars));
    }

    public function arrecadacao()
    {
        [$page, $blocos] = $this->getPageById(7);

        return view('frontend.pages.arrecadacao', compact('page', 'blocos'));
    }

    public function faleConosco()
    {
        abort(404);
        [$page, $blocos] = $this->getPageById(4);

        return view('frontend.pages.fale-conosco', compact('page', 'blocos'));
    }

    public function trabalheConosco()
    {
        [$page, $blocos] = $this->getPageById(6);

        $oportunidades = \App\Oportunidade::with('arquivos')
            ->where('ativo', 1)
            ->orderBy('ordem', 'asc')
            ->orderBy('data_final_inscricao', 'desc')
            ->get();

        $oportunidadesencerradas = \App\Oportunidade::with('arquivos')
            ->where('ativo', 0)
            ->orderBy('ordem', 'asc')
            ->orderBy('data_final_inscricao', 'desc')
            ->get();

        // $legislacaoCategorias = \App\LegislacoesCategoria::with([
        //     'legislacoes' => function($query) {
        //         return $query->where('status', 1);
        //     }
        // ])
        // ->where('status', 1)
        // ->get();

        return view('frontend.pages.trabalhe-conosco', compact('page', 'blocos', 'oportunidades', 'oportunidadesencerradas'));
    }

    public function ondeEstamos()
    {
        [$page, $blocos] = $this->getPageById(11);

        $all = \App\Regiao::all();

        $regioes = $all->groupBy('regiao');
        $cidades = $all->groupBy('cidade');

        return view('frontend.pages.onde-estamos', compact('page', 'blocos', 'regioes', 'cidades', 'all'));
    }

    public function queroSerFornecedor()
    {
        [$page, $blocos] = $this->getPageById(5);

        $regras = null;

        $regras = $blocos->getBloco('quero-ser-fornecedor-regras')->first();

        return view('frontend.pages.quero-ser-fornecedor', compact('page', 'blocos', 'regras'));
    }
}
