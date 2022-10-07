<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_beneficiario')->nullable();
            $table->string('edad_beneficiario')->nullable();
            $table->string('dui_beneficiario')->nullable();
            $table->string('partida_beneficiario')->nullable();
            $table->string('perentezco')->nullable();
            $table->string('porcentaje_beneficiario')->nullable();
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
        Schema::dropIfExists('beneficiarios');
    }
}
