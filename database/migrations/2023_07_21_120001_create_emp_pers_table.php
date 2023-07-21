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
        Schema::create('emp_pers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('set null');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id')
                ->references('id')
                ->on('personas')
                ->onDelete('set null');
            $table->unsignedBigInteger('funcion_id')->nullable();
            $table->foreign('funcion_id')
                ->references('id')
                ->on('funciones')
                ->onDelete('set null');
            $table->integer('estado_id');    
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
        Schema::dropIfExists('emp_pers');
    }
};
