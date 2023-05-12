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
        Schema::create('tiposerviciocotizar', function (Blueprint $table) {
            $table->id('pk_tiposerviciocotizar');
            $table->string('tiposervicio',50);
            $table->string('video');
            $table->string('preguntasfre',45);
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
        Schema::dropIfExists('tiposerviciocotizar');
    }
};
