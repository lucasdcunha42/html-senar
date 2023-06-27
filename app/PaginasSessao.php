<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PaginasSessao extends Model
{
     protected $table = 'paginas_sessoes';

     public function blocos()
     {
         return $this->hasMany(BlocosEstatico::class, 'pagina_sessao_id');
     }
}
