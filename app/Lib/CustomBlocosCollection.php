<?php

namespace App\Lib;

use Illuminate\Database\Eloquent\Collection;

class CustomBlocosCollection extends Collection
{
    public function getBloco($identificador)
    {
        return self::where('identificador', $identificador)->first();
    }
}
