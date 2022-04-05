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
        DB::table('adresses')->where('idAdresse', '=', 17996)->delete();

        DB::table('adresses')->insert([
            ['idAdresse' => 17996, 'adresse' => 'Pl. de la Gare', 'npa' => '1225', 'descriptionLieu' => 'Entrée côté tour Opale', 'latitude' => 46.1964577, 'longitude' => 6.197314]

        ]);
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
