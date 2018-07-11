<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//    public function up()
//    {
//        Schema::create('saida', function (Blueprint $table) {
//            $table->engine = 'InnoDB';
//            $table->increments('id');
//            $table->date('data');
//            $table->decimal('valor',10,2);
//            $table->text('observacao')->nullable();
//            $table->integer('setor_id')->unsigned();
//            $table->foreign('setor_id')->references('id')->on('setor')->onDelete('cascade');;
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
//        Schema::dropIfExists('entrada_saida');
//    }
}
