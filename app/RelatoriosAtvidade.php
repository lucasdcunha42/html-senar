<?php

namespace App;
class RelatoriosAtvidade extends CustomModel
{
    public function getLink()
    {
        if(!empty(trim($this->link))) {
            return $this->link;
        }

        $downloads = json_decode($this->download);

        // pega o primeiro somente
        foreach($downloads as $download) {
            return asset('storage/' . $download->download_link);
        }
    }
}
