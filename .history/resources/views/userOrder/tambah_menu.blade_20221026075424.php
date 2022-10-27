@extends('layouts.master')
@section('content')
<div style="margin-left: 300px; margin-top: 30px">
    <h1 style="margin-left: 300px; margin-top: 30px">Tambah Menu</h1><br>
    <a href="#modal" style="margin-left: 300px; margin-top: 30px"><button class="btn btn-success">Tambah</button></a><br><br>


<div id="modal" class="modal">
    <form action="" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama">
        <input type="number" name="harga" placeholder="Harga">
        <button>Masukan</button>
    </form>
</div>
@endsection