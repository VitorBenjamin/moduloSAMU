<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Fk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('chamados', function (Blueprint $table) {        
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('prioridades_id')->references('id')->on('prioridades');
            $table->foreign('filas_id')->references('id')->on('filas');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('enderecos_id')->references('id')->on('enderecos');
            DB::statement("ALTER TABLE chamados ADD img LONGBLOB");
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
