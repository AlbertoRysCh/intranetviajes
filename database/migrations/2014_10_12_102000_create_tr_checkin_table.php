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
            $table->unsignedBigInteger('userID');
            $table->string('tip_maleta')->nullable();
            $table->string('num_etiqueta')->nullable();
            $table->string('color')->nullable();
            $table->string('caracteristicas')->nullable();
            $table->string('peso')->nullable();
            $table->string('images')->nullable();
            $table->string('lugar_regis')->nullable();
            $table->timestamps();
             // Foreign keys
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
