<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdemToLegislacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legislacoes', function (Blueprint $table) {
            $table->float('ordem')->after('categoria_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('legislacoes', function (Blueprint $table) {
            $table->dropColumn('ordem');
        });
    }
}
