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
        return view('movieInput')->with($param); 
    }

    public function reviewInput()
    {
        $rev                   = new review(); 
        $param['datareview']  = $rev->getall(); 
        return view('reviewInput')->with($param); 
    }


    public function postReview(Request $request) {
        $nama     = $request->txtNama;
        $comment  = $request->txtReview;

        if($request->btnInsert)
        {
            DB::insert("insert into review values (0, '$nama', '$comment')"); 
            return $this->reviewInput(); 
        }
        else if($request->btnUpdate) 
        {
            DB::update("update review set comment = '$comment' where namaReview = '$nama'"); 
            return $this->reviewInput(); 
        }
        else if($request->btnDelete)
        {
            DB::delete("delete from review where namaReview = '$nama'"); 
            return $this->reviewInput(); 
        }
    }

    public function postMovie(Request $request) {
        $ID      = $request->txtID;
        $nama    = $request->txtNama;
        $tahun   = $request->txtRilis;

        if($request->btnInsert)
        {
            DB::insert("insert into movie values (0, '$nama', '$tahun')"); 
            return $this->movieInput(); 
        }
        else if($request->btnUpdate) 
        {
            //DB::update("update movie set namaMovie = '$nama' or tahunRilis = '$tahun' where idMovie = '$ID'"); 
            DB::update("update movie set tahunRilis = '$tahun' where namaMovie = '$nama'"); 
            return $this->movieInput(); 
        }
        else if($request->btnDelete)
        {
            DB::delete("delete from movie where namaMovie = '$nama'"); 
            return $this->movieInput(); 
        }
    }
}
