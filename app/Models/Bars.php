<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bars extends Model
{

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

    public function adress()
	{
		return $this->belongsTo(Adress::class, 'idAdresse');
	}
}
