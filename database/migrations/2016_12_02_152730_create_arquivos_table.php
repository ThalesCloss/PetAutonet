<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_original',255);
            $table->string('descricao',255);
            $table->string('nome_arquivo',255);
            $table->integer('tipo_arquivos_id')->unsigned();
            $table->string('extensao',12);
            $table->timestamps();
            $table->foreign('tipo_arquivos_id')->references('id')->on('tipo_arquivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos');
    }
}
