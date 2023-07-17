<?php

namespace App;

use App\Traits\Model\SearchTrait;

class Noticia extends CustomModel
{
    use SearchTrait;

    protected $table = 'noticias';

    public function category()
    {
        return $this->belongsTo(NoticiasCategoria::class, 'categoria');
    }

    public function getBackground()
    {
        if(!empty(trim($this->imagem))) {
            return asset('storage/' . $this->imagem);
        }
        return '';
    }

    public function getArrayFilesPath()
    {
        $arquivos = json_decode($this->arquivo);

        if(!is_array($arquivos)) {
            return null;
        }

        if(!count($arquivos)) {
            return null;
        }

        $arr = [];

        foreach($arquivos as $arquivo) {
            $arr[] = $arquivo->download_link;
        }
        return $arr;
    }

    public function getArrayFiles()
    {

        $arquivos = json_decode($this->arquivo);

        if(!is_array($arquivos)) {
            return null;
        }

        if(!count($arquivos)) {
            return null;
        }

        $arr = [];

        foreach($arquivos as $arquivo) {
            $arr[] = $arquivo;
        }
        return $arr;
    }

}
