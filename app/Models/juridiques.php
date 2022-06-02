<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class juridiques extends Model
{
/**
* class juridiques - model bdd pour la nature juridique
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

public function etablissements()
	{
		return $this->hasMany(Etablissement::class);
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
