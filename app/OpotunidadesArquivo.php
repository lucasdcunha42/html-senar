<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class OpotunidadesArquivo extends Model
{

    public $appends = ['link'];

    protected $table = 'opotunidades_arquivos';

    public function getLinkAttribute()
    {
        $obj = json_decode($this->arquivo);

        if(count($obj) == 1) {
            return asset('storage/' . $obj[0]->download_link);
        }

        return '--';
    }
}
