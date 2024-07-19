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
        Schema::create('tr_quota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travelID');
            $table->unsignedBigInteger('userID');
            $table->string('codigo');
            $table->float('quota');
            $table->float('amount');
            $table->date('date');
            $table->string('status_pay');
            $table->string('valid_status');
            $table->text('resume');
            
            $table->foreign('travelID')->references('travelID')->on('tr_travels');
            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_quota');
    }
};
