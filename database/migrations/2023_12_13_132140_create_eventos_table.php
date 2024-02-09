<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('titulo', 255);
            $table->string('estado', 100);
            $table->string('cidade', 500);
            $table->text('texto');
            $table->string('link', 255);
            $table->string('download', 255);
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->string('slug', 255);
            $table->tinyInteger('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
