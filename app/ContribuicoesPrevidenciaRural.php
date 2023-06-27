<?php

namespace App;
class ContribuicoesPrevidenciaRural extends CustomModel
{
    protected $table = 'contribuicoes_previdencia_rural';

    public function downloadLink()
    {
        $links = json_decode($this->download);

        if(!is_array($links)) {
            $links = [$links];
        }

        if(empty($links)) {
            return '';
        }

        $html = '<a ';
        foreach($links as $link) {
            $html .= 'target="_blank" href="'. asset('storage/' . $link->download_link) .'">';
            $html .= $this->titulo . '</a>';
        }

        return $html;
    }
}
