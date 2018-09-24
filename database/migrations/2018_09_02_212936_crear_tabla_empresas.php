<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_comercial');
            $table->string('denominacion_social');
            $table->string('nif_cif');
            $table->string('persona_contacto');
            $table->string('cargo_en_empresa');
            $table->string('telefonos');
            $table->string('correo_electrónico');
            $table->boolean('empresa_aprobada');
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
        Schema::dropIfExists('empresas');
    }
}
