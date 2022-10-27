@extends('layouts.master')
@section('content')

<h1 style="margin-left: 300px; margin-top: 30px">Tambah Menu</h1><br>
<a href="#modal" style="margin-left: 78px; margin-top: 30px"><button class="btn btn-success">Tambah</button></a><br><br>

<div id="modal">
    <form action="" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Menu"><br><br>
        <input type="number" name="nama" placeholder="Harga">
        <button class="btn btn-success">Tambah</button>
    </form>
</div>
@endsection