<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SindicatosMunicipio extends Model
{
    protected $table = 'sindicatos_municipios';

    public function sindicato()
    {
        return $this->belongsTo(Sindicato::class, 'sindicato_id');
    }
}
