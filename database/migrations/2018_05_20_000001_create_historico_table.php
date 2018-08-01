<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_historico')->nullable();
            $table->date('data_entrada');
            $table->integer('entrada_id');
            $table->integer('entrada_detalhe_id');
            $table->integer('saida_id')->default(0);
            $table->integer('saida_detalhe_id')->default(0);
            $table->double('qtde_entrada', 10,2);
            $table->double('qtde_removida', 10,2)->default(0);
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
        Schema::dropIfExists('historico');
    }
}
