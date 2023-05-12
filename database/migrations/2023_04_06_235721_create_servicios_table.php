<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('pk_servicios');
            $table->string('servicio',30);
            $table->string('preservicio',30);
            $table->string('descuento',30);
            $table->string('cantdescu',30);
            $table->string('total',45);
            $table->unsignedBigInteger('fk_cotizaciones');
            $table->foreign('fk_cotizaciones')->references('pk_cotizacion')->on('cotizaciones');
            $table->smallInteger('estatus')->default(1);
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
        Schema::dropIfExists('servicios');
    }
};
