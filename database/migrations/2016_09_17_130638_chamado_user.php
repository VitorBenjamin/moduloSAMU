<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChamadoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chamado_user', function (Blueprint $table) {
            $table->integer('chamado')->unsigned();            
            $table->integer('user')->unsigned();
            $table->foreign('chamado')->references('id')->on('chamados')->onDelete('cascade');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
