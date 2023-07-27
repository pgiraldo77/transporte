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
        Schema::create('guia_remitos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guia_id')->nullable();
            $table->foreign('guia_id')
                ->references('id')
                ->on('guias')
                ->onDelete('set null');
            $table->unsignedBigInteger('remito_id')->nullable();
            $table->foreign('remito_id')
                ->references('id')
                ->on('remitos')
                ->onDelete('set null');
            $table->integer('bultos');
            $table->float('valor_dec');
            $table->float('posicion');
            $table->float('m_cubicos');
            $table->float('kgr');
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
        Schema::dropIfExists('guia_remitos');
    }
};
