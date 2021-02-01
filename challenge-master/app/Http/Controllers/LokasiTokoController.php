<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\LokasiToko;
use PDF;
// use DB;

class LokasiTokoController extends Controller
{
    //
    public function index(){

        $toko = DB::table('lokasi_toko')->get();
        return view('/toko/listtoko')->with(compact("toko"));

    }

    public function TitikAwal(){

        return view('toko/TitikAwal');


    }

    public function save(Request $request){
        $id = (DB::table('lokasi_toko')->count('BARCODE'))+1;
        $id_barcode = "IDTK".str_pad($id,4,"0",STR_PAD_LEFT);
        DB::table('lokasi_toko')->insert([
            'BARCODE'   =>  $id_barcode,
            'NAMA_TOKO' =>  $request->namatoko,
            'LATITUDE'  =>  $request->lat,
            'LONGITUDE' =>  $request->long,
            'ACCURACY'   =>  $request->acc
        ]);

        return redirect('/Toko/List_Toko');

    }

    public function TitikKunjung(){        
        return view('toko/TitikKunjung');
    }

    public function getNamaToko(){
        $id_toko = $_POST['id'];
        $data = DB::table('lokasi_toko')->select('nama_toko', 'latitude', 'longitude', 'accuracy')->where('barcode', $id_toko)->get();
        return response()->json(['data'=> $data]);
    }

    public function coba(){
        return view('toko/cobak');
    }

    public function cetak($id){
        $toko = DB::table('lokasi_toko')->where('barcode', $id)->get();
        $no = 1; 
        $pdf =  PDF::loadView ('toko/CetakListToko',  compact('toko', 'no')); 
        $pdf->setPaper('f4'); 
        return $pdf->stream();
    }
}
