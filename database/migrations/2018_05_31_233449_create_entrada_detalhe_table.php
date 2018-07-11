<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaDetalheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//    public function up()
//    {
//        Schema::create('entrada_detalhe', function (Blueprint $table) {
//            $table->engine = 'InnoDB';
//            $table->increments('id');
//            $table->decimal('valor_unitario',10,2);
//            $table->decimal('valor_total',10,2);
//            $table->decimal('quantidade',10,2);
//            $table->integer('entrada_id')->unsigned();
//            $table->foreign('entrada_id')->references('id')->on('entrada')->onDelete('cascade');;
//            $table->integer('tipo_unidade_id')->unsigned();
//            $table->foreign('tipo_unidade_id')->references('id')->on('tipo_unidade')->onDelete('cascade');;
//            $table->integer('produto_id')->unsigned();
//            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');;
//            $table->timestamps();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('entrada_detalhe');
//    }
}
