@extends('layouts.master')
@section('content')
<style>
    #modal{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        visibility: hidden;
    }
</style>
<h1 style="margin-left: 300px; margin-top: 30px">Tambah Menu</h1><br>
<a href="#modal" style="margin-left: 78px; margin-top: 30px"><button class="btn btn-success">Tambah</button></a><br><br>

<div id="modal">
    <form action="" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Menu"><br><br>
        <input type="number" name="nama" placeholder="Harga"><br><br>
        <button class="btn btn-success">Tambah</button>
    </form>
</div>
@endsection