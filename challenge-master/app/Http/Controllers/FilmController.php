<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $film = DB::table('film')->get();
        $review = DB::table('review')->get();
        return view('film.view', ['film' => $film, 'review' => $review]);  
    }

    public function addreview(Request $request)
    {
        //
		DB::table('review')->insert([
			'ID_FILM' => $request->namafilm,
			'NAMA_REVIEWER' => $request->reviewer,
			'REVIEW' => $request->review
		]);
		return redirect('film');
    }

    public function addfilm(Request $request){
		$this->validate($request, [
			'poster' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('poster');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'storage';
		$file->move($tujuan_upload,$nama_file);
 
		DB::table('film')->insert([
			'JUDUL' => $request->judul,
			'PEMERAN' => $request->pemeran,
			'POSTER' =>  $nama_file,
			'SUTRADARA' => $request->sutradara
		]);
 
		return redirect('film');
	}
	public function updatefilm($id, Request $request) {
		$toUpdate = [
			'JUDUL' => $request->judul,
			'PEMERAN' => $request->pemeran,
			'SUTRADARA' => $request->sutradara
		];

		if ($request->file('POSTER')) {
			$toUpdate['POSTER'] =  $request->poster;
		}

		$updateData = DB::table('film')->where('ID_FILM',$id)->update($toUpdate);

		return redirect('film');
	}

	public function destroyreview($id)
    {
        $review = DB::table('review')->where('ID_REVIEW', $id)->delete();
		return redirect('film')->with('status', 'Data review Berhasil Di hapus.');
    }  
}
