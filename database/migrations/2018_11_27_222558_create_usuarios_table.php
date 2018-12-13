<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
          $table->increments('usuario_id');
          $table->string('nome');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->timestamps('data_hora')->nullable();
          $table->binary('fotoProfile')->nullable();
          $table->string('estado')->nullable();
          $table->string('cidade')->nullable();
          $table->boolean('ativo');
          $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
