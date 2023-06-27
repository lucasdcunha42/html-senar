<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ContribuicoesPrevidenciaRuralCategoria extends Model
{
    public $table = 'contribuicoes_previdencia_rural_categoria';

    public function contribuicoes()
    {
        return $this->hasMany(ContribuicoesPrevidenciaRural::class, 'categoria_id');
    }
}
