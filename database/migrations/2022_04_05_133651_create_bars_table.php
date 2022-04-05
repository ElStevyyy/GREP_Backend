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
        //CreationTable
        Schema::create('bars', function (Blueprint $table) {
            $table->increments('idBar');
            $table->integer('idAdresse');
            $table->string('description', 255);
            $table->string('proprietaire', 64);
            
        });

        //Insertion des données
        DB::table('bars')->insert([
            ['idAdresse' => 13774, 'description' => '', 'proprietaire' => ''],
            ['idAdresse' => 13553, 'description' => '', 'proprietaire' => ''],
            ['idAdresse' => 6377, 'description' => '', 'proprietaire' => ''],
            ['idAdresse' => 17996, 'description' => '', 'proprietaire' => '']
        ]);

        Schema::table('bars', function (Blueprint $table){
            $table->foreign('idAdresse')->references('idAdresse')->on('adresses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bars');
    }
};
