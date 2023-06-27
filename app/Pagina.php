<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pagina extends Model
{
    public function blocos()
    {
        return $this->hasMany(BlocosEstatico::class, 'pagina_id');
    }
}
