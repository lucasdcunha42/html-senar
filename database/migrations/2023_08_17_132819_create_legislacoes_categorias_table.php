<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegislacoesCategoriasTable extends Migration
{
    public function up()
    {
        Schema::create('legislacoes_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('legislacoes_categorias');
    }
}
