<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarMiaNoa extends Model
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BarMiaNoa', function (Blueprint $table) {
            $table->increments('idBarMiaNoa');
            $table->float('Latitude');
            $table->float('Longitude'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BarMiaNoa');
    }
}
