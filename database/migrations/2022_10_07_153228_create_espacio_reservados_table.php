<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacioReservadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacio_reservados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->unsignedBigInteger('ejecutivo_id')->nullable();

            $table->foreign('sucursal_id')->references('id')->on('sucursals')->onDelete('cascade');
            $table->foreign('ejecutivo_id')->references('id')->on('ejecutivos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacio_reservados');
    }
}
