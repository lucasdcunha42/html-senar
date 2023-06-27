<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProgramasController extends Controller
{
    public function index()
    {
        [$page, $blocos] = $this->getPageById(18);

        $programas = \App\ProgramasCapacitacao::orderBy('created_at', 'desc')->get();

        return view('frontend.pages.programas', compact('programas', 'page', 'blocos'));
    }

    public function single($slug)
    {
        $programa = \App\ProgramasCapacitacao::where('slug', $slug)->firstOrFail();

        $galeria = $programa->imageGallery();

        $comoParticipar = \App\BlocosEstatico::where('identificador', 'como-participar')->first();

        return view('frontend.pages.programas-single', compact('programa', 'galeria', 'comoParticipar'));
    }
}
