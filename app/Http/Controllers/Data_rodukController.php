<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Data_rodukController extends Controller
{
    public function index()
    {
    $data_produk = DB::table('data_produk')->get();

    return view('index',['data_produk' => $data_produk]);
    }
}
