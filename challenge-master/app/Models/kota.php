<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
	protected $table = 'tbl_kabkot';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'provinsi_id' => 'int'
	];

	protected $fillable = [
		'provinsi_id',
		'kabupaten_kota',
		'ibukota',
		'k_bsni'
	];

	public function provinsi()
	{
		return $this->belongsTo(provinsi::class, 'id');
	}

	public function kecamatan()
	{
		return $this->hasMany(kecamatan::class, 'kabkot_id');
	}
}
