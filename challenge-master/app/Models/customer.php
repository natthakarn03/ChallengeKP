<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'id_customer';
	public $timestamps = false;

	protected $casts = [
		'id_kelurahan' => 'int'
	];

	protected $fillable = [
		'id_customer',
		'nama',
		'alamat',
		'foto',
		'file_path',
		'id_kelurahan'
	];

	public function kelurahan()
	{
		return $this->belongsTo(kelurahan::class, 'id');
	}
}
