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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('pk_proyectos');
            $table->string('nproyecto',50);
            $table->string('descripcion',50);
            $table->string('url');
            $table->unsignedBigInteger('fk_tiposerviciocotizar');
            $table->foreign('fk_tiposerviciocotizar')->references('pk_tiposerviciocotizar')->on('tiposerviciocotizar');
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
        Schema::dropIfExists('proyectos');
    }
};
