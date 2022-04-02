<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Etablissement
 * 
 * @property int|null $idEtablissement
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
 * @property string|null $immaDt
 *
 * @package App\Models
 */
class Etablissement extends Model
{
	protected $connection = 'mysql';
	protected $table = 'etablissements';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idEtablissement' => 'int',
		'idAdresse' => 'int',
		'idTaille' => 'int',
		'idJuridique' => 'int'
	];

	protected $fillable = [
		'idEtablissement',
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

	/**
	 * Relation avec Adresse
	 */

	public function adresse(){
		return $this->hasOne(Adress::class);
	}

	/**
	 * Relation avec Juridique
	 */
	public function juridique(){
		return $this->hasOne(juridiques::class);
	}
}
