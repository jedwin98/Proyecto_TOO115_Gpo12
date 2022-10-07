<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudAsociadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_asociados', function (Blueprint $table) {
            $table->id();
            $table->string('estado_solicitud')->nullable();

            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->unsignedBigInteger('datos_personales_id')->nullable();
            $table->unsignedBigInteger('espacio_reservado_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('biometrica_id')->nullable();

            $table->timestamps();

            $table->foreign('ubicacion_id')->references('id')->on('ubicacions')->onDelete('cascade');
            $table->foreign('datos_personales_id')->references('id')->on('datos_personales')->onDelete('cascade');
            $table->foreign('espacio_reservado_id')->references('id')->on('espacio_reservados')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('biometrica_id')->references('id')->on('biometricas')->onDelete('cascade');
            




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_asociados');
    }
}
