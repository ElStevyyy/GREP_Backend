<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Adress
 * 
 * @property int $idAdresse
 * @property string $adresse
 * @property string|null $npa
 * @property string|null $descriptionLieu
 * @property float|null $longitude
 * @property float|null $latitude
 * 
 * @property Collection|Etablissement[] $etablissements
 *
 * @package App\Models
 */
class Adress extends Model
{
	protected $connection = 'mysql';
	protected $table = 'adresses';
	protected $primaryKey = 'idAdresse';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idAdresse' => 'int',
		'longitude' => 'float',
		'latitude' => 'float'
	];

	protected $fillable = [
		'adresse',
		'npa',
		'descriptionLieu',
		'longitude',
		'latitude'
	];

	public function etablissements()
	{
		return $this->hasMany(Etablissement::class);
	}
}
