<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsociacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_asociacion')->nullable();

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
        Schema::dropIfExists('asociacions');
    }
}
