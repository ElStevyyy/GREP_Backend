<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taille
 * 
 * @property int $idTaille
 * @property string|null $taille
 * 
 * @property Collection|Etablissement[] $etablissements
 *
 * @package App\Models
 */
class Taille extends Model
{
	protected $connection = 'mysql';
	protected $table = 'tailles';
	protected $primaryKey = 'idTaille';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idTaille' => 'int'
	];

	protected $fillable = [
		'taille'
	];

	public function etablissements()
	{
		return $this->hasMany(Etablissement::class, 'idTaille');
	}
}
