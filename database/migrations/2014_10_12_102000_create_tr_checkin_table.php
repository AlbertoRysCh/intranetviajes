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
        Schema::create('tr_checkin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travelID');
            $table->unsignedBigInteger('userID');
            $table->string('tip_documento')->nullable();
            $table->string('num_documento')->nullable();
            $table->date('fecha_emi')->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('image_documento')->nullable();
            $table->string('pass_board')->nullable();
            $table->string('equipaje_8kg')->nullable();
            $table->string('equipaje_23kg')->nullable();
            $table->string('descrip_8kg')->nullable();
            $table->string('descrip_23kg')->nullable();
            $table->timestamps();
             // Foreign keys
             $table->foreign('travelID')->references('travelID')->on('tr_travels')->onDelete('cascade');
             $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_checkin');
        
    }
};
