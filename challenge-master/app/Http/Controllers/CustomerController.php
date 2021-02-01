<?php

namespace App\Http\Controllers;


use App\Models\customer;

use Session;

use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $customer = DB::table('customer')->get();
        return view('customer.customer', ['customer' => $customer]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $provinsi = DB::table('tbl_provinsi')->pluck('provinsi','id');
        return view('/customer/tambahcus1',compact('provinsi'));
    }

    public function create2()
    {   $provinsi = DB::table('tbl_provinsi')->pluck('provinsi','id');
        return view('/customer/tambahcus2',compact('provinsi'));
    }

    public function kota()
    {   
        $id_provinsi = $_POST['id'];
        $kota = DB::table('tbl_kabkot')->where("provinsi_id",$id_provinsi)->pluck('kabupaten_kota','id');
        return  response()->json($kota);
    }

    public function kecamatan()
    {   
        $id_kota = $_POST['id'];
        $kecamatan = DB::table('tbl_kecamatan')->where("kabkot_id",$id_kota)->pluck('kecamatan','id');
        return  response()->json($kecamatan);
    }

    public function kelurahan()
    {   
        $id_kecamatan = $_POST['id'];
        $kelurahan = DB::table('tbl_kelurahan')->where("kecamatan_id",$id_kecamatan)->pluck('kelurahan','id');
        return  response()->json($kelurahan);
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('customer')->insert([
            'id_kelurahan' => $request->kelurahan,
            'nama' => $request->nama_cus,
            'alamat' => $request->alamat
            // 'foto' => base64_encode($request->foto)
        ]);
        // return redirect('/Customer');

        return response()->json([
            "message" => "Barang berhasil ditambah"
        ], 201);

    }

    public function store2(Request $request)
    {
        // decode base64 ke png
        $foto = $request->foto;
        $foto = str_replace('data:image/png;base64,', '', $foto);
        $foto = str_replace(' ', '+', $foto);
        $foto_png = base64_decode($foto);

        // nama foto 
        $nama_foto = time(). $request->input_nama . '.png';
        $nama_foto = str_replace(' ', '_', $nama_foto);

        // path foto
        $path_foto = '/storage/'.$nama_foto;

        // simpan foto ke path
        \File::put(base_path().'/public/storage'.$nama_foto, $foto_png);

        DB::table('customer')->insert([
            'id_kelurahan' => $request->kelurahan,
            'nama' => $request->nama_cus,
            'alamat' => $request->alamat,
            'foto' => base64_encode($request->foto),
            'file_path' => $path_foto
        ]);
        return redirect('/Customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function export_excel()
    {
        return Excel::download(new CustomerController, 'customer.xlsx');
    }

    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_customer',$nama_file);
 
        // import data
        Excel::import(new CustomerImport, public_path('/file_customer/'.$nama_file));
 
        // notifikasi dengan session
        Session::flash('sukses','Data Customer Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect('/Customer');
    }

}
