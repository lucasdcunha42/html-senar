<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventosInscrito extends Model
{
    protected $table = "eventos_inscritos";

    protected $fillable = [
        'evento_id',
        'inscrito_id',
        'presenca'
    ];
    public $timestamp = true;

    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
