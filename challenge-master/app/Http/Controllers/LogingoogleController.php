<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
// use DB;

class LogingoogleController extends Controller
{
    public function index(){

        return view('/login/google');

    }
}
