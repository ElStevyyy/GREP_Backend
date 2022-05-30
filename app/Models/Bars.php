<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bars extends Model
{

/**
 * Class Bars - Model bdd pour un Bar
 * 
 * @property int $idBar
 * @property int $idAdress
 * @property string|null $description
 * @property string|null $propriétaire
 *
 * @package App\Models
 */
    protected $connection = 'mysql';
	protected $table = 'bars';
	protected $primaryKey = 'idBar';
	public $incrementing = true;
	public $timestamps = false;

    protected $casts = [
		'idBar' => 'int',
		'idAdresse' => 'int'
	];

    protected $fillable = [
		'description',
        'type'
	];

	/**
	 * Relation du Bar à une adresse spécifique
	 */
    public function adress()
	{
		return $this->belongsTo(Adress::class, 'idAdresse');
	}
}
