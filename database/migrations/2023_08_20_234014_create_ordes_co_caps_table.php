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
        Schema::create('ordes_co_caps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ori_des_id')->nullable();
            $table->foreign('ori_des_id')
                  ->references('id')
                  ->on('origen_dests')
                  ->onDelete('set null');
            $table->unsignedBigInteger('coche_cap_id')->nullable();
            $table->foreign('coche_cap_id')
                        ->references('id')
                        ->on('coche_caps')
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
        Schema::dropIfExists('ordes_co_caps');
    }
};
