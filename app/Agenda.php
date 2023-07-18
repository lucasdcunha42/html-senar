<?php

namespace App;
use App\SindicatosMunicipio;
use Illuminate\Database\Eloquent\Model;


class Agenda extends CustomModel
{

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cod_curso', 'cod_curso');
    }

    public function sindicato()
    {
        return $this->belongsTo(SindicatosMunicipio::class, 'id_municipio', 'id')
                    ->join('sindicatos', 'sindicatos_municipios.sindicato_id', '=', 'sindicatos.id');
    }

}
