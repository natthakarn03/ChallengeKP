<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    public $table = 'review';
    public $primaryKey = 'idReview';
    public $timestamps = false;
    public $fillable = ['idReview','namaReview', 'comment'];
    public $incrementing = true; 

    public function getall()
    {
        $query  = review::all();
        return $query;
    }

    public function simpandata($idReview, $nama, $comment) {
        $revi = new review(); 
        $revi->idReview   = $idReview; 
        $revi->namaReview = $nama; 
        $revi->comment    = $comment; 
        $revi->save(); 
    }

    public function getmovie()
    {
        return $this->hasMany('App\movie');
    }
}
