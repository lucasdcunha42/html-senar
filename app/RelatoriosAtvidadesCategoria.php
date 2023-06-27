<?php

namespace App;

class RelatoriosAtvidadesCategoria extends CustomModel
{
    public function relatorios()
    {
        return $this->hasMany(RelatoriosAtvidade::class, 'categoria_id');
    }
}
