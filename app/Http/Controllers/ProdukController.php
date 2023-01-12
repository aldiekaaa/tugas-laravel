<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ProdukController extends Controller
{
    public function index()
    {
    $produk = DB::table('produk')->get();

    return view('index',['produk' => $produk]);
    }

        /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_produk'     => 'required|min:5',
            'nama_produk'   => 'required|min:30',
            'harga_produk'   => 'required|min:10',
            'deskripsi_produk'   => 'required'
        ]);

        //create post
        DB::create([
            'id_produk'     => $request->id_produk(),
            'nama_produk'     => $request->nama_produk,
            'harga_produk'   => $request->harga_produk,
            'deskripsi_produk'   => $request->deskripsi_produk
        ]);

        //redirect to index
        return redirect()->route('DB.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
