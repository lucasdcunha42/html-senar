<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ContatosAssuntosEmails extends Model
{
   protected $table = 'contatosa_assuntos_emails';

   public function assunto()
   {
       return $this->belongsTo(ContatosAssunto::class, 'assunto_id');
   }
}
