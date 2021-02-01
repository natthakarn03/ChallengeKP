<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
	protected $table = 'tbl_kecamatan';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'kabkot_id' => 'int'
	];

	protected $fillable = [
		'kabkot_id',
		'kecamatan'
	];

	public function kota()
	{
		return $this->belongsTo(kota::class, 'id');
	}

	public function kelurahan()
	{
		return $this->hasMany(kelurahan::class, 'kecamatan_id');
	}
}
