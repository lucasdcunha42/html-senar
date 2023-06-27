<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->Imagem);
    }

    public function hasTitleOrSubtitle()
    {
        return !empty(trim($this->titulo)) || !empty(trim($this->subtitulo));
    }

    public function getTitle()
    {
        return !empty(trim($this->titulo)) ? '<h3>'. $this->titulo .'</h3>' : '';
    }

    public function getSubTitle()
    {
        return !empty(trim($this->subtitulo)) ? '<p>'.$this->subtitulo.'</p>' : '';
    }
}
