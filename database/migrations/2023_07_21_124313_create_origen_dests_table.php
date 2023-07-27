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
        Schema::create('origen_dests', function (Blueprint $table) {
            $table->id();
            $table->string('tabla');
            $table->integer('tabla_id');
            $table->string('subid');
            $table->unsignedBigInteger('emp_loco_id')->nullable();
            $table->foreign('emp_loco_id')
                ->references('id')
                ->on('emp_locs')
                ->onDelete('set null');
            $table->unsignedBigInteger('emp_locd_id')->nullable();
            $table->foreign('emp_locd_id')
                    ->references('id') 
                    ->on('emp_locs')
                    ->onteDele('set null');
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
        Schema::dropIfExists('guia_origen_dests');
    }
};
