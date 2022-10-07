<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_referencia')->nullable();
            $table->string('telefono_referencia')->nullable();
            $table->string('correo_referencia')->nullable();
            $table->string('tipo_referencia')->nullable();
            $table->unsignedBigInteger('asociado_id')->nullable();

            $table->timestamps();

            $table->foreign('asociado_id')->references('id')->on('asociados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencias');
    }
}
