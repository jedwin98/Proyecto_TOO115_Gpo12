<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable();
            $table->string('iso', 3)->primary();
            $table->string('nombreMay')->nullable();
            $table->string('nombreMin')->nullable();
            $table->string('iso3')->nullable();
            $table->string('codigo')->nullable();
            $table->string('extensionTel')->nullable();

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
        Schema::dropIfExists('pais');
    }
}
