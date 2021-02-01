<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Book;

class BookController extends Controller
{
    public function createBook(Request $request) 
    {
        $book = new Book;
        $book->name = $request->name;
        $book->$author = $request->author;
        $book->save();

        // DB::table('barang')->insert([
        //     'id_barang' => $request->id_barang,
        //     'nama' => $request->nama
        // ]);

        return response()->json([
            "message" => "Buku berhasil ditambah"
        ], 201);
    }
}
