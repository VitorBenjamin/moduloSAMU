<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->increments('id');   
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);            
            $table->string('descricao');
            $table->boolean('clinico');
            $table->string('referencia');
            $table->integer('status_id')->unsigned()->default(1);
            $table->integer('prioridades_id')->unsigned()->default(1);
            $table->integer('filas_id')->unsigned()->default(1);
            $table->integer('users_id')->unsigned()->default(1);
            $table->integer('enderecos_id')->unsigned()->nullable();            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamados');
    }
}
