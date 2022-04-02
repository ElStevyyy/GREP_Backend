<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Adress
 * 
 * @property int $IDPOSITION
 * @property string $ADRESSE
 * @property string|null $NPA
 * @property string|null $DESCRIPTIONLIEU
 * @property float|null $longitude
 * @property float|null $latitude
 *
 * @package App\Models
 */
class Adress extends Model
{
	protected $connection = 'mysql';
	protected $table = 'adresses';
	protected $primaryKey = 'IDPOSITION';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDPOSITION' => 'int',
		'longitude' => 'float',
		'latitude' => 'float'
	];

	protected $fillable = [
		'ADRESSE',
		'NPA',
		'DESCRIPTIONLIEU',
		'longitude',
		'latitude'
	];
}
