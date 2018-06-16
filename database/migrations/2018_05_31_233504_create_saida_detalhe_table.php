<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaidaDetalheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saida_detalhe', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->decimal('valor_unitario',10,2);
            $table->decimal('valor_total',10,2);
            $table->decimal('quantidade',10,2);
            $table->integer('saida_id')->unsigned();
            $table->foreign('saida_id')->references('id')->on('saida');
            $table->integer('tipo_unidade_id')->unsigned();
            $table->foreign('tipo_unidade_id')->references('id')->on('tipo_unidade');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('entrada_saida_detalhe');
    }
}
