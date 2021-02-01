<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
	protected $table = 'tbl_provinsi';
	protected $primaryKey = 'id';
	public $timestamps = false;
	
	protected $fillable = [
		'provinsi','ibukota','p_bsni'
	];

	public function kota()
	{
		return $this->hasMany(kota::class, 'provinsi_id');
	}
}
