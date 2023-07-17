<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agenda extends CustomModel
{

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cod_curso', 'cod_curso');
    }

    public function sindicato()
    {
        return $this->belongsTo(Sindicato::class, 'nome_sindicato', 'nome');
    }

}
