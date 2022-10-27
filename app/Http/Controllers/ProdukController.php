<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        $kategori = Kategori::all();
          return view('produk.index', ["produk" => $produk, "kategori" => $kategori]);
    }

    public function store(Request $request)
    {
            Produk::create($request->all());
            return redirect('produk')->with('success', 'Task Created Successfully!');
    }

    public function edit($id)
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        $dataspro = Produk::find($id);
        return view("produk.index", ["produk" => $produk, "dataspro" => $dataspro, "kategori" => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $dataspro = Produk::find($id)->update($request->all());
        return redirect('produk')->with('success', 'Task Created Successfully!');
    }

    public function delete($id) 
    {
        $dataspro = Produk::find($id)->delete();
        return redirect('produk')->with('success', 'Task Created Successfully!');

    }
}
