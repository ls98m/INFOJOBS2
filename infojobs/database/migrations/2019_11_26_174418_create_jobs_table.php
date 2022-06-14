<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id_oferta');
            $table->bigInteger('id_empresa')->unsigned();
            $table->string('puesto_trabajo');
            $table->timestamp('fecha_publicacion');
            $table->string('descripcion');
            $table->string('jornada');
            $table->string('contrato');
            $table->double('salario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
