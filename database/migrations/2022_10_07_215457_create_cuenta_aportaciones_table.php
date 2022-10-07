<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaAportacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_aportaciones', function (Blueprint $table) {
            $table->id();
            $table->float('cuota')->nullable();
            $table->float('primera_cuota')->nullable();

            $table->unsignedBigInteger('asociado_id')->nullable();
            $table->unsignedBigInteger('forma_pago_id')->nullable();

            $table->timestamps();

            $table->foreign('asociado_id')->references('id')->on('asociados')->onDelete('cascade');
            $table->foreign('forma_pago_id')->references('id')->on('forma_pagos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta_aportaciones');
    }
}
