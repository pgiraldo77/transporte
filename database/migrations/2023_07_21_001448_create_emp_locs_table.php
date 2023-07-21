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
        Schema::create('emp_locs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')
                   ->references('id')
                   ->on('empresas')
                   ->onDelete('set null');
            $table->unsignedBigInteger('localidad_id')->nullable();       
            $table->foreign('localidad_id')
                   ->references('id')
                   ->on('localidades')
                   ->onDelete('set null');
            $table->String('direccion');       
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
        Schema::dropIfExists('emp_locs');
    }
};
