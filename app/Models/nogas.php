<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nogas extends Model
{
    /**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('nogas', function (Blueprint $table) {
$table->increments('idNogas');
$table->string('nom');
$table->string('code');

});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('juridiques');
}
}
