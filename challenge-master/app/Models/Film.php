<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
	protected $primaryKey = 'ID_FILM';
	public $timestamps = false;

	protected $fillable = [
		'ID_FILM',
		'GAMBAR',
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
