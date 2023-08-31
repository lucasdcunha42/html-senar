<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sindicato extends Model
{
    public function municipios()
    {
        return $this->hasMany(SindicatosMunicipio::class, 'sindicato_id');
    }

    /** revisar necessidade
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'sindicato_id');
    }
    */


    public function getMunicipios()
    {
        return json_encode($this->municipios->pluck('municipio'));
    }
}
