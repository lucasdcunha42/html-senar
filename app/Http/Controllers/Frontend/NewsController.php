<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function index()
    {
        // dd(\App\Noticia::where('slug', 'seminario-em-nao-me-toque-reune-mais-de-200-participantes')->first());

        [$page, $blocos] = $this->getPageById(8);

        $query = $this->getQuery();

        // $query->with('category')->take(12)->orderBy('id', 'asc');
        $query->with('category')->take(12)->orderBy('created_at', 'desc');

        $perPage = 6;
        $total = $query->count();

        $noticias = $query->get();

        $startAutoLoadObject = json_encode([
            'perPage' => $perPage,
            'busca' => request()->get('busca'),
            'total' => $total,
            'currentCount' => $noticias->count(),
            'urlAjax' => route('page.news.loadMore')
        ]);

        return view('frontend.news.index', compact('noticias', 'page', 'blocos', 'startAutoLoadObject', 'total'));
    }

    public function single($slug)
    {
        $noticia = \App\Noticia::with('category')->active()->where('slug', $slug)->firstOrFail();

        $galeria = $noticia->imagegallery('galeria');

        return view('frontend.news.single', compact('noticia', 'galeria'));
    }

    public function loadMore()
    {
        $request = request();

        $query = $this->getQuery();

        $perPage = $request->get('perPage');

        $currentCount = $request->get('currentCount');

        $query->with('category')
                ->take($perPage)
                ->skip($currentCount)
                ->orderBy('created_at', 'desc');

        $noticias = $query->get();

        $view = view('frontend.news.load-more', compact('noticias'))->render();

        return response()->json([
            'view' => $view,
            'currentCount' => $currentCount + $noticias->count()
        ]);
    }

    private function getQuery()
    {
        $query = \App\Noticia::query();
        $query->active();

        if(request()->has('busca')) {
            $busca = request()->get('busca');
            $campos = ['titulo', 'subtitulo', 'texto'];
            if(!empty($busca)) {
                $query->search($busca, $campos);
            }
        }

        if(request()->has('date')) {
            $date = request()->get('date');
            $explodedDate = explode('-', $date);
            if(count($explodedDate) == 2) {
                $initialDate = \Carbon\Carbon::createFromFormat('d/m/Y', trim($explodedDate[0]))->startOfDay();
                $finalDate = \Carbon\Carbon::createFromFormat('d/m/Y', trim($explodedDate[1]))->endOfDay();

                $query->whereBetween('created_at', [$initialDate, $finalDate]);
            }
        }

        return $query;
    }
}
