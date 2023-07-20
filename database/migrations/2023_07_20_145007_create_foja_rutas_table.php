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
        Schema::create('foja_rutas', function (Blueprint $table) {
            $table->id();
            $table->integer('nro');
            $table->float('m_cub_tot');
            $table->date('fecha_sal');
            $table->boolean('completo');
            $table->String('observacion');
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
        Schema::dropIfExists('foja_ruta');
    }
};
