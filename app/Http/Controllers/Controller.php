<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

use App\movie;
use App\review; 

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view('home');
    }

    public function movieInput()
    {
        $mov                   = new movie(); 
        $param['datamovie']  = $mov->getall(); 

        $rev                   = new review(); 
        $param['datareview']  = $rev->getall(); 
        return view('movieInput')->with($param); 
    }

    public function reviewInput()
    {
        return view('reviewInput');
    }


    public function postReview(Request $request) {
        $idReview = $request->txtIdReview;
        $nama     = $request->txtNama;
        $comment  = $request->txtReview;

        if($request->btnSubmit)
        {
            DB::insert("insert into review values (0, '$nama', '$comment')"); 
            return $this->reviewInput(); 
        }
    }

    public function postMovie(Request $request) {
        $idMovie = $request->txtIdMovie;
        $nama    = $request->txtNama;
        $tahun   = $request->txtRilis;

        if($request->btnSubmit)
        {
            DB::insert("insert into movie values (0, '$nama', '$tahun')"); 
            return $this->movieInput(); 
        }
    }
    public function deleteMovie(Request $request) {
        $idMovie = $request->txtidMovie;

        if($request->btnDelete)
        {
            DB::delete("delete from movie where idMovie = '$idMovie'"); 
            return $this->movie(); 
        }
    }
    public function deleteReview(Request $request) {
        $idReview = $request->txtidReview;
        
        if($request->btnDelete)
        {
            DB::delete("delete from movie where idReview = '$idReview'"); 
            return $this->movie(); 
        }
    }
}
