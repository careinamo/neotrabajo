<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('descripcion_larga');
            $table->integer('numero_puestos');
            $table->string('tareas_desenvolver');
            $table->date('plazo_presentación');
            $table->integer('tipo_contrato_id');
            $table->date('fecha_incorporacion');
            $table->string('duracion_contratos');                       
            $table->string('localidad');
            $table->time('horario_incio');
            $table->time('horario_fin');
            $table->string('salario');
            $table->string('formación_requisito');
            $table->string('experiencia_requisito');
            $table->string('otros_requisitos');
            $table->boolean('validada');
            $table->integer('empresa_id')->nullable();;
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
        Schema::dropIfExists('ofertas');
    }
}
