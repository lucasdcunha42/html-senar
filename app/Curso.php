<?php

namespace App;
    class Curso extends CustomModel
{
    public $appends = ['ano_mes'];

    public function getAnoMesAttribute()
    {
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $this->data_inicio);

        return $date->format('Y-m');
    }

    public function scopeSituacaoA($query)
    {
        return $query->where('situacao', 'A')->orWhere('situacao', 'a');
    }

    public function depoimentos()
    {
        return $this->hasMany(CursosDepoimento::class, 'curso_id');
    }
    //verificar
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'curso_id');
    }

}
