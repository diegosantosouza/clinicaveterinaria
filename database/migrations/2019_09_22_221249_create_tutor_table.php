<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor', function (Blueprint $table) {
            /*
             * Dados do tutor
             */
            $table->id();
            $table->string('nome');
            $table->string('genero')->nullable();
            $table->bigInteger('cpf')->nullable();
            $table->bigInteger('rg')->nullable();
            $table->string('orgao_expedidor')->nullable();

            /*
             * Endereço
             */
            $table->string('rua')->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();

            /*
             * Contato
             */
            $table->bigInteger('telefone')->nullable();
            $table->bigInteger('celular')->nullable();
            $table->string('email')->nullable();

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
        Schema::dropIfExists('tutor');
    }
}
