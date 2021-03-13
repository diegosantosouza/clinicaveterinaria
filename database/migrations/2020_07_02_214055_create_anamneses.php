<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('queixa');
            $table->string('estado_geral')->nullable();
            $table->string('peso')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('frequencia_cardiaca')->nullable();
            $table->string('frequencia_respiratoria')->nullable();
            $table->string('mucosas')->nullable();
            $table->string('t_p_capilar')->nullable();
            $table->string('hidratacao')->nullable();
            $table->string('linfonodos')->nullable();
            $table->string('tegumentos')->nullable();
            $table->string('sis_digestorio')->nullable();
            $table->string('sis_genito_urinario')->nullable();
            $table->string('sis_locomotor')->nullable();
            $table->string('sis_neurologico')->nullable();
            $table->string('sis_cardiologico')->nullable();
            $table->string('alimentacao')->nullable();
            $table->string('ectoparasitos')->nullable();
            $table->string('vermifugacao')->nullable();
            $table->string('banhos')->nullable();
            $table->longText('suspeita_diagnostica')->nullable();
            $table->longText('solicitacao_exames')->nullable();
            $table->longText('tratamento')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->timestamps();
            $table->foreignId('id_animal')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamneses');
    }
}
