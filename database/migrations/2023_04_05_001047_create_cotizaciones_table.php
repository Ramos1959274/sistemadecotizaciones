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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('pk_cotizacion');
            $table->unsignedBigInteger('fk_tiposerviciocotizar');
            $table->foreign('fk_tiposerviciocotizar')->references('pk_tiposerviciocotizar')->on('tiposerviciocotizar');
            $table->unsignedBigInteger('fk_cliente');
            $table->foreign('fk_cliente')->references('pk_cliente')->on('cliente');
            $table->DATE('fechadecot');
            $table->string('lugardeex',50);
            $table->string('tipodeent',50);
            $table->smallInteger('estatus')->default('1');
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
        Schema::dropIfExists('cotizaciones');
    }
};
