<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//    public function up()
//    {
//        Schema::create('produtos', function (Blueprint $table) {
//            $table->engine = 'InnoDB';
//            $table->increments('id');
//            $table->string('nome', 120);
//            $table->string('estoque')->nullable();
//            $table->text('descricao')->nullable();
//            $table->double('peso', 10,2)->nullable();
//            $table->double('volume', 10,2)->nullable();
//            $table->date('vencimento')->nullable();
//
//            $table->integer('tipo_unidade_id')->unsigned();
//            $table->foreign('tipo_unidade_id')->references('id')->on('tipo_unidade')->onDelete('cascade');;
//
//            $table->integer('categoria_id')->unsigned();
//            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');;
//
//            $table->integer('fornecedor_id')->unsigned();
//            $table->foreign('fornecedor_id')->references('id')->on('fornecedor')->onDelete('cascade');;
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
//        Schema::dropIfExists('produtos');
//    }
}
