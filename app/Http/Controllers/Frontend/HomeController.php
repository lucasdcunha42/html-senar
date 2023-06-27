<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $programas = \App\ProgramasCapacitacao::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $noticias = \App\Noticia::with('category')->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $destaques = \App\Destque::all();

        return view('frontend.pages.home', compact('programas', 'noticias', 'destaques'));
    }
}
