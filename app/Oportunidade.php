<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Oportunidade extends Model
{
    public function arquivos()
    {
        return $this->hasMany(OpotunidadesArquivo::class, 'oportunidade_id');
    }

    public function getDataFinalInscricao()
    {
        try {
            return \Carbon\Carbon::createFromFormat('Y-m-d', $this->data_final_inscricao)->format('d/m/Y');
        } catch (\Exception $e) {
            return '-';
        }

    }
}
