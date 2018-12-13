<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaDetalheUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_DetalheUsuario', function (Blueprint $table) {
            $table->increments('detalhe_id');
            $table->integer('usuario_id');
            $table->integer('campus_id');
            $table->string('formacao');
            $table->string('sexo');
            $table->string('trabalho');
            $table->integer('idade');
            $table->binary('sobre');
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
        Schema::dropIfExists('TB_DetalheUsuario');
    }
}
