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
}
