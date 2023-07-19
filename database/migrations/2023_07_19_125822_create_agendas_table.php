<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->integer('cod_curso');
            $table->integer('id_municipio');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('desc_fase_evento');
            $table->string('regiaoevento');
            $table->integer('agenda_num_evento');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
