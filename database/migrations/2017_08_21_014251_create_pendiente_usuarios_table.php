<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendienteUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendiente_usuarios', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->integer('pendiente_id')->unsigned();
            $table->foreign('pendiente_id')->references('id')->on('pendientes');
            $table->boolean('esMia');

            $table->primary(['usuario_id','pendiente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendiente_usuarios');
    }
}
