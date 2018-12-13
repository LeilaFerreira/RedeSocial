<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('comentarios_id');
            $table->integer('post_id');
            $table->integer('usuario_id');
            $table->longText('comentario');
            $table->timestamps();
            $table->foreign('post_id')->references('post_id')->on('posts')->on_delete('restrict');
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->on_delete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
