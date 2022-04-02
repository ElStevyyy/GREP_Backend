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
        //
        Schema::enableForeignKeyConstraints();
        Schema::table('etablissements', function (Blueprint $table){
            $table->foreign('idAdresse')->references('idAdresse')->on('adresses');
            $table->foreign('idTaille')->references('idTaille')->on('tailles');
            $table->foreign('idJuridique')->references('idJuridique')->on('juridiques');
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
};
