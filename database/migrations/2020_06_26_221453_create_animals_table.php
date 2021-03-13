<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome_animal');
            $table->string('especie');
            $table->string('raca')->nullable();
            $table->string('sexo');
            $table->string('idade')->nullable();
            $table->string('castrado');
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            $table->foreignId('tutor_n')->references('id')->on('tutor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
