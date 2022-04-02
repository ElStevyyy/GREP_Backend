<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etablissement
 * 
 * @property int $idEtablissement
 * @property int|null $idAdresse
 * @property int|null $idTaille
 * @property int|null $idJuridique
 * @property string|null $nom
 * @property string|null $codeNoga
 * @property string|null $typeLocal
 * @property string|null $branche
 * @property string|null $activiteDetaile
 * @property string|null $raisonSocialParent
 * @property string|null $telPrincipal
 * @property string|null $telSecondaire
 * @property string|null $email
 * @property string|null $siteInternet
 * @property string|null $numIde
 * @property string|null $raisonSocial
 * @property Carbon|null $immaDt
 * 
 * @property Adress|null $adress
 * @property Juridique|null $juridique
 * @property Taille|null $taille
 *
 * @package App\Models
 */
class Etablissement extends Model
{
	protected $connection = 'mysql';
	protected $table = 'etablissements';
	protected $primaryKey = 'idEtablissement';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idEtablissement' => 'int',
		'idAdresse' => 'int',
		'idTaille' => 'int',
		'idJuridique' => 'int'
	];

	protected $dates = [
		'immaDt'
	];

	protected $fillable = [
		'idAdresse',
		'idTaille',
		'idJuridique',
		'nom',
		'codeNoga',
		'typeLocal',
		'branche',
		'activiteDetaile',
		'raisonSocialParent',
		'telPrincipal',
		'telSecondaire',
		'email',
		'siteInternet',
		'numIde',
		'raisonSocial',
		'immaDt'
	];

	public function adress()
	{
		return $this->belongsTo(Adress::class, 'idAdresse');
	}

	public function juridique()
	{
		return $this->belongsTo(Juridique::class, 'idJuridique');
	}

	public function taille()
	{
		return $this->belongsTo(Taille::class, 'idTaille');
	}
}
