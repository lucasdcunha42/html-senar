<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inscrito extends Model
{
    protected $fillable = ['nome','cpf', 'email','cidade', 'atividade','telefone'];
    public $timestamps = true;

    public function evento() {

        return $this->belongsToMany(Evento::class, 'eventos_inscritos', 'inscrito_id', 'evento_id' );
    }
}
