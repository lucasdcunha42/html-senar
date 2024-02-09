<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CustomModel extends Model
{
    public function attrFilled($attr)
    {
        return !empty(trim($this->{$attr}));
    }

    public function createdAt()
    {
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $date->format('d.m.Y');
    }

    public function getAttrDateFromFormat(
        $attr = 'created_at',
        $fromFormat = 'Y-m-d H:i:s',
        $toFormat = 'd.m.Y H:i:s'
    ) {
        $date = \Carbon\Carbon::createFromFormat($fromFormat, $this->{$attr});
        return $date->format($toFormat);
    }

    public function imageGallery($attr = 'galeria_fotos')
    {
        $galeria = json_decode($this->{$attr});

        return is_array($galeria) ? $galeria : [];
    }

    // scopes
    public function scopeInComming($query, $col_data_fim = 'divulgacao_fim', $final_format = 'Y-m-d')
    {
        return $query->where($col_data_fim, '>=', now()->format($final_format));
    }

    public function scopeSinceTomorrow($query, $col = 'created_at', $format = 'Y-m-d')
    {
        return $query->where($col, '>', now()->format($format));
    }

    public function scopeActive($query, $col = 'status', $value = 1)
    {
        return $query->where($col, $value);
    }

}
