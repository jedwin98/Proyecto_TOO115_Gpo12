<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaAhorrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_ahorros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ultimo_corte')->nullable();
            $table->date('fecha_este_corte')->nullable();
            $table->float('saldo_anterior')->nullable();
            $table->float('saldo_actual')->nullable();
            $table->float('interes')->nullable();
            $table->float('saldo_promedio')->nullable();
            
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
        Schema::dropIfExists('cuenta_ahorros');
    }
}
