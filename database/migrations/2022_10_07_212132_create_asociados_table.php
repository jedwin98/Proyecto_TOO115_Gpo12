<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsociadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociados', function (Blueprint $table) {
            $table->id();
            $table->string('profesion')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->float('salario')->nullable();
            $table->string('estado')->nullable();

            $table->unsignedBigInteger('datos_personales_id')->nullable();


            $table->timestamps();

            $table->foreign('datos_personales_id')->references('id')->on('datos_personales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asociados');
    }
}
