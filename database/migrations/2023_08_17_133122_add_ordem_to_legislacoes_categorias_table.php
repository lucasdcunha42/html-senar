<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdemToLegislacoesCategoriasTable extends Migration
{
    public function up()
    {
        Schema::table('legislacoes_categorias', function (Blueprint $table) {
            $table->float('ordem')->after('status')->nullable();
        });
    }

    public function down()
    {
        Schema::table('legislacoes_categorias', function (Blueprint $table) {
            $table->dropColumn('ordem');
        });
    }
}
