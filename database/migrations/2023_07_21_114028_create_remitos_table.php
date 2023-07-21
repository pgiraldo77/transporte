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
        Schema::create('remitos', function (Blueprint $table) {
            $table->id();
            $table->string('nro',20);
            $table->date('fecha');
            $table->date('fecha_sello');
            $table->unsignedBigInteger('factura_id')->nullable(); 
            $table->foreign('factura_id')
                   ->references('id')
                   ->on('facturas')
                   ->onDelete('set null');
            $table->unsignedBigInteger('emp_loc_id')->nullable();        
            $table->foreign('emp_loc_id')
                   ->references('id')
                   ->on('emp_locs')
                   ->onDelete('set null');
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
        Schema::dropIfExists('remitos');
    }
};
