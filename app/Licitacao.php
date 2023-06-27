<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Licitacao extends Model
{
    protected $table = 'licitacoes';

    public function getDataAbertura()
    {
        return \Carbon\Carbon::parse($this->data_abertura)->format('d/m/Y');
    }
}
