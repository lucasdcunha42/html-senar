<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('codigo')->nullable();
            $table->text('nome')->nullable();
            $table->string('modalidade')->nullable();
            $table->text('descricao')->nullable();
            $table->string('areadeinteresse')->nullable();
            $table->string('situacao', 10)->nullable();
            $table->string('cargahorariatotal')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('minimodeparticipantes')->nullable();
            $table->string('maximodeparticipantes')->nullable();
            $table->text('conteudoprogramatico')->nullable();
            $table->string('idade')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
