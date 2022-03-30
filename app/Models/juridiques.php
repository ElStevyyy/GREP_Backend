<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class juridiques extends Model
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('juridiques', function (Blueprint $table) {
$table->increments('idJuridiques');
$table->float('natureJuridique');
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
