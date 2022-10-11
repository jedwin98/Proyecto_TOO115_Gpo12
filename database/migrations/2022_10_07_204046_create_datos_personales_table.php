<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre1')->nullable();
            $table->string('nombre2')->nullable();
            $table->string('nombre3')->nullable();
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('numero_documento')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('conyugue')->nullable();
            $table->longText('pdf_documento')->nullable();
            $table->longText('pdf_nit')->nullable();
            $table->longText('pdf_isss')->nullable();
            $table->longText('pdf_nup')->nullable();

            $table->string('pais_iso',30)->nullable();
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->unsignedBigInteger('direccion_id')->nullable();


            $table->timestamps();

            $table->foreign('pais_iso')->references('iso')->on('pais')->onDelete('cascade');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('direccion_id')->references('id')->on('direccions')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_personales');
    }
}
