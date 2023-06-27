<?php

namespace App\Http\Controllers\Admin;

trait XMLTrait
{
    public function getXmlPathBySettings($setting_key)
    {

        if(empty(json_decode(setting($setting_key)))) {
            throw new \Exception("Erro ao carregar arquivo", 1);
        }

        $fileObj = json_decode(setting($setting_key))[0];

        $path = storage_path('app/public/' . $fileObj->download_link);

        if(!file_exists($path)) {
            throw new \Exception("Arquivo não encontrado", 1);
        }

        return $path;
    }
}
