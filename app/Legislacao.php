<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Legislacao extends Model
{
  protected $table = 'legislacoes';

    public function getArrayFilesPath()
    {
        $arquivos = json_decode($this->arquivo);

        if(!is_array($arquivos)) {
            return null;
        }

        if(!count($arquivos)) {
            return null;
        }

        $arr = [];

        foreach($arquivos as $arquivo) {
            $arr[] = $arquivo->download_link;
        }
        return $arr;
    }

    public function getArrayFiles()
    {
        
        $arquivos = json_decode($this->arquivo);

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
}
