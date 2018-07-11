<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('cpf_cnpj', 16)->nullable();
            $table->string('nome_fantasia', 255)->nullable();
            $table->string('telefone',12)->nullable();
            $table->string('fone_contato', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('dt_nascimento')->nullable();

            $table->integer('tipo_pessoa_id')->unsigned();
            $table->foreign('tipo_pessoa_id')->references('id')->on('tipo_pessoa')->onDelete('cascade');;
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
        Schema::dropIfExists('pessoa');
    }
}
