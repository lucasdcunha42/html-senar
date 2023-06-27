<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tranparencia extends Model
{
    public function arquivos()
    {
        return $this->hasMany(TranparenciasArquivo::class, 'transparencia_id');
    }
}
