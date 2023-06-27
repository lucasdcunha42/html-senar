<?php

namespace App;

use App\Lib\CustomBlocosCollection;
use Illuminate\Database\Eloquent\Model;


class BlocosEstatico extends Model
{
    protected $table = 'blocos_estaticos';

    public function newCollection(array $models = [])
    {
        return new CustomBlocosCollection($models);
    }

    public function getLink()
    {
        $text = $this->link;
        if(empty(trim($text))) {
            return '';
        }

        $arr = explode('|', $text);

        if(count($arr) != 2) {
            return '';
        }

        return (object) ['text' => trim($arr[0]), 'url_path' => trim($arr[1])];
    }
}
