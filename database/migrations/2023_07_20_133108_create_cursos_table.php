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
            $table->bigInteger('cod_curso');
            $table->text('nome_curso')->nullable();
            $table->text('descricao')->nullable();
            $table->string('situacao', 10)->nullable();
            $table->string('TipoProgramacao')->nullable();
            $table->string('areadeinteresse')->nullable();
            $table->string('modalidade')->nullable();
            $table->integer('cargahorariatotal')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('idade')->nullable();
            $table->integer('minimodeparticipantes')->nullable();
            $table->integer('maximodeparticipantes')->nullable();
            $table->text('conteudoprogramatico')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('agenda_num_evento')->nullable();
            $table->string('slug');
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
