<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->longText('latitud')->nullable();
            $table->longText('longitud')->nullable();

            $table->string('pais_iso',3)->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();

            $table->timestamps();


            $table->foreign('pais_iso')->references('iso')->on('pais')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacions');
    }
}
