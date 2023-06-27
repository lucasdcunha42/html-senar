<?php

namespace App;
class Evento extends CustomModel
{
    private const TIPO_FEIRAS_E_EXPOSICOES = 1;
    private const TIPO_OUTROS = 2;

    public function getDataInicioFormatada()
    {
        return \Carbon\Carbon::parse($this->data_inicio)->format('d.m.Y');
    }

    public static function getTipos() {
        return collect([
            self::TIPO_FEIRAS_E_EXPOSICOES => 'Feiras e Exposições',
            self::TIPO_OUTROS => 'Outros'
        ]);
    }

}
