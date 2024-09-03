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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('groupID')->nullable();
            $table->string('name');
            $table->string('apellidos')->default(''); // Valor predeterminado
            $table->string('telefono')->nullable(); // Hacer nullable si es necesario
            $table->string('username')->unique();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('sexo')->nullable(); // Hacer nullable si es necesario
            $table->string('tip_documento')->nullable();
            $table->string('documento')->nullable(); // Hacer nullable si es necesario
            $table->date('nacimiento')->nullable(); // Hacer nullable si es necesario
            $table->integer('edad')->nullable(); // Hacer nullable si es necesario
            $table->string('direccion')->nullable(); // Hacer nullable si es necesario
            $table->string('pais_origen')->nullable(); 
            $table->string('nombre_emer')->nullable(); // Hacer nullable si es necesario
            $table->string('apellido_emer')->nullable(); // Hacer nullable si es necesario
            $table->string('celular_emer')->nullable(); // Hacer nullable si es necesario
            $table->date('fecha')->nullable(); // Hacer nullable si es necesario
            $table->string('foto')->nullable(); // Hacer nullable si es necesario
            $table->string('tipo_viajero')->nullable(); // Hacer nullable si es necesario
            $table->string('pulsera')->nullable(); // Hacer nullable si es necesario
            $table->string('orden')->nullable(); // Hacer nullable si es necesario
            $table->string('hobbies')->nullable(); // Hacer nullable si es necesario
            $table->string('deportes')->nullable(); // Hacer nullable si es necesario
            $table->string('plato_fav')->nullable(); // Hacer nullable si es necesario
            $table->string('color_fav')->nullable(); // Hacer nullable si es necesario
            $table->text('acti_relacional')->nullable(); // Hacer nullable si es necesario
            $table->text('espe_detalles_r')->nullable(); // Hacer nullable si es necesario
            $table->text('otr_conductas')->nullable(); // Hacer nullable si es necesario
            $table->text('espe_detalles_c')->nullable(); // Hacer nullable si es necesario
            $table->text('informacion_ad')->nullable(); // Hacer nullable si es necesario
            $table->string('noti_email')->nullable();
            $table->string('pdf_generar')->nullable(); // Hacer nullable si es necesario
            $table->string('pdf_total_user')->nullable(); // Hacer nullable si es necesario
            $table->string('pdf_fecha_hora')->nullable(); // Hacer nullable si es necesario
            $table->timestamps();

            $table->foreign('groupID')->references('groupID')->on('tr_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
