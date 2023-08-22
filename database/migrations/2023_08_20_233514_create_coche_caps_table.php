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
        Schema::create('coche_caps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coche_id')->nullable();
            $table->unsignedBigInteger('cap_carga_id')->nullable();

            $table->foreign('coche_id')->references('id')->on('coches')->onDelete('set null'); 
            $table->foreign('cap_carga_id')->references('id')->on('cap_cargas')->onDelete('set null');     
            
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
        Schema::dropIfExists('coche_caps');
    }
};
