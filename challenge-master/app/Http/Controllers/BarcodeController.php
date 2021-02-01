<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;

// use DB;

class BarcodeController extends Controller
{
    public function barcode() {
        $barang = DB::table('barang')->get();
        //$barang = Barcode::get(); 
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        //return view('barcode.barcode', ['barang' => $barang]);
        //->with(compact('barang'));
        return response()->json([$barang], 200);

    }

    public function create(Request $request) 
    {
        $data = DB::table('barang');
        $data = new $data;
        $data->id_barang = $request->id_barang;
        $data->$nama = $request->nama;
        $data->save();

        // DB::table('barang')->insert([
        //     'id_barang' => $request->id_barang,
        //     'nama' => $request->nama
        // ]);

        return response()->json([
            "message" => "Barang berhasil ditambah"
        ], 201);
    }   
    
    public function printBarcode(){
        $barang = DB::table('barang')->get();
        $no = 1; 
        $paper_width = 793.7007874; // 21 cm
        $paper_height = 623.62204724; // 16.5 cm
        $paper_size = array(0, 0, $paper_width, $paper_height);
        $pdf =  PDF::loadView  ('/barcode/barcode_pdf',  compact('barang', 'no')); 
        $pdf->setPaper("f4"); 
        return $pdf->stream(); 
    }

    public function scannerBarcode(){
        return view('barcode.barcode_scanner');
    }

}
