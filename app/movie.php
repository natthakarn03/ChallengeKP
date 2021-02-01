<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    public $table = 'movie';
    public $primaryKey = 'idMovie';
    public $timestamps = false;
    public $fillable = ['idMovie','namaMovie', 'tahunRilis'];
    public $incrementing = true; 


    public function simpandata($idMovie, $nama, $tahun) {
        $movi = new movie(); 
        $movi->idMovie    = $idMovie; 
        $movi->namaMovie  = $nama; 
        $movi->tahunRilis = $tahun; 
        $movi->save(); 
    }

    public function getall()
    {
        $query  = movie::all();
        return $query;
    }
}
