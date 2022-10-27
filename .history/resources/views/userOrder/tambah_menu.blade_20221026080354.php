@extends('layouts.master')
@section('content')
<style>
    .modals{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        visibility: hidden;
        opacity: 0;
        background: rgba(0,0,0,0.8);
        transition: 500ms;
    }

    .modals:target{
        opacity: 1;
        visibility: visible;
    }

    .lolz{
        margin-left: 10rem;
    }
</style>
<h1 style="margin-left: 300px; margin-top: 30px">Tambah Menu</h1><br>
<a href="#modal" style="margin-left: 78px; margin-top: 30px"><button class="btn btn-success">Tambah</button></a><br><br>

<div id="modal" class="modals">
    <div class="lolz">
    <form action="" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Menu"><br><br>
        <input type="number" name="nama" placeholder="Harga"><br><br>
        <button class="btn btn-success">Tambah</button>
    </form>
</div>
</div>
@endsection