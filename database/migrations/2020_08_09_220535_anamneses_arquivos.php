<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnamnesesArquivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses_arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('anamnese_id');
            $table->string('path')->nullable();
            $table->boolean('cover')->nullable();
            $table->timestamps();

            $table->foreign('anamnese_id')->references('id')->on('anamneses')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
