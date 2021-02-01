<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
	protected $table = 'tbl_kelurahan';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'kecamatan_id' => 'int'
		'kd_pos' => 'int'
	];

	protected $fillable = [
		'kecamatan_id',
		'kelurahan',
		'kd_pos'
	];

	public function kecamatan()
	{
		return $this->belongsTo(kecamatan::class, 'id');
	}

	public function customer()
	{
		return $this->hasMany(customer::class, 'id_kelurahan');
	}
}
