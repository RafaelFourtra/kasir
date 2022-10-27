<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('kategori.index', compact('data'));
    }

    public function store(Request $request)
    {
        Kategori::create($request->all());
        return redirect('kategori')->with('success', 'Task Created Successfully!');
    }

    public function edit($id)
    {
        $data = Kategori::all();
        $datas = Kategori::find($id);
        return view("kategori.index", ["data" => $data, "datas" => $datas]);
    }

    public function update(Request $request, $id)
    {
        $datas = Kategori::find($id)->update($request->all());
        return redirect('kategori')->with('success', 'Task Created Successfully!');
    }
    public function delete($id) 
    {
        $datas = Kategori::where('id_kategori',$id);
        $datas->delete();
        return redirect('kategori')->with('success', 'Task Created Successfully!');

    }
}
