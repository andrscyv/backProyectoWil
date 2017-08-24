<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('asunto');
            $table->text('descripcion');
            $table->string('horas');
            $table->date('fechaIni');
            $table->date('fechaEntrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendientes');
    }
}
