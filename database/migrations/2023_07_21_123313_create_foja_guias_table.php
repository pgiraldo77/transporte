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
        Schema::create('foja_guias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guia_id')->nullable();
            $table->foreign('guia_id')
                ->references('id')
                ->on('guias')
                ->onDelete('set null');
            $table->unsignedBigInteger('foja_id')->nullable();
            $table->foreign('foja_id')
                ->references('id')
                ->on('foja_rutas')
                ->onDelete('set null');
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
        Schema::dropIfExists('foja_guias');
    }
};
