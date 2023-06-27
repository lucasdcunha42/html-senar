<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LegislacoesCategoria extends Model
{
    public function legislacoes()
    {
        return $this->hasMany(Legislacao::class, 'categoria_id');
    }
}
