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
        Schema::create('incluye', function (Blueprint $table) {
            $table->id('pk_incluye');
            $table->string('modincluye',100);
            $table->unsignedBigInteger('fk_cotizaciones');
            $table->foreign('fk_cotizaciones')->references('pk_cotizacion')->on('cotizaciones');
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
        Schema::dropIfExists('incluye');
    }
};
