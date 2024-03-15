<?php

namespace App;

use Carbon\Carbon;

class Evento extends CustomModel
{
    private const TIPO_FEIRAS_E_EXPOSICOES = 1;
    private const TIPO_OUTROS = 2;

    public function getDataInicioFormatada()
    {
        return Carbon::parse($this->data_inicio)->format('d.m.Y');
    }

    public function getDataInicioFormatadaCertificado()
    {
        return Carbon::parse($this->data_inicio)->format('d/m/Y');
    }

    public static function getTipos() {
        return collect([
            self::TIPO_FEIRAS_E_EXPOSICOES => 'Feiras e Exposições',
            self::TIPO_OUTROS => 'Outros'
        ]);
    }

    public function inscritos()
    {
        return $this->belongsToMany(Inscrito::class, 'eventos_inscritos')->withPivot('presenca')->withTimestamps();
    }

    public function estaCheio()
    {
        return $this->inscritos->count() >= $this->capacidade;
    }

    public static function cidades(){
        $cidades = SindicatosMunicipio::orderBy('municipio')->pluck('municipio','id');
        $cidades->prepend('Outra', '');
        return $cidades;
    }

    public function getArrayFiles()
    {

        $arquivos = json_decode($this->download);

        if(!is_array($arquivos)) {
            return null;
        }

        if(!count($arquivos)) {
            return null;
        }

        $arr = [];

        foreach($arquivos as $arquivo) {
            $arr[] = $arquivo;
        }
        return $arr;
    }

    public function estaOcorrendo() {
        $hoje = Carbon::today();

        if($hoje->betweenIncluded($this->data_inicio, $this->data_fim)){
            return true;
        }

        return false;
    }
}
