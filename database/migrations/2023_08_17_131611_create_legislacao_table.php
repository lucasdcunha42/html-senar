<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegislacaoTable extends Migration
{
    public function up()
    {
        Schema::create('legislacao', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Link');
            $table->string('Status');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('Arquivo')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('legislacao');
    }
}
