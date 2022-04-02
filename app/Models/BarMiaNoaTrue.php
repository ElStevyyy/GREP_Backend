<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarMiaNoaTrue extends Model
{
    protected $fillable = ['Latitude', 'Longitude'];
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BarMiaNoaTrue', function (Blueprint $table) {
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
        Schema::dropIfExists('BarMiaNoaTrue');
    }

    
}
