@extends('layouts.master')
@section('content')
<script src="https://bit.ly/javascript"></script>
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
        margin-left: 50rem;
        margin-top: 15rem;
    }

    .close{
        color: white; 
        opacity: 1;
        margin-top: -11rem;
        font-size: 50px;
        margin-right: 25px;
    }
    .close:hover{
        color: black;
        opacity: 1;
        transition: 0.3s;
    }
</style>
<h1 style="margin-left: 300px; margin-top: 30px">Tambah Menu</h1><br>
<a href="#modal" style="margin-left: 78px; margin-top: 30px"><button class="btn btn-success">Tambah</button></a><br><br>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                  @foreach($lihat as $key)
                    <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$key->menu}}</td>
                    <td>{{number_format($key->harga)}}</td>
                    <td><img src="{{asset('uploads/menu/'.$key->gambar)}}" style="height: 50px;"></td>
                    <td><a href="#update" class="btn btn-warning tombol" value="{{$key->id}}">Edit</a>
                        <a href="tambah/{{$key->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                
                </tbody>
        </table>
        </div>
    </div>
</div>

<div id="modal" class="modals">
    <div class="lolz">
    <form action="/tambah" method="POST" enctype="multipart/form-data">
        @csrf
        <a href="#" class="close">&times</a>
        <input type="text" name="menu" placeholder="Nama Menu"><br><br>
        <input type="number" name="harga" placeholder="Harga"><br><br>
        <input type="file" name="gambar"><br><br>
        <button class="btn btn-success">Tambah</button>
    </form>
</div>
</div>

<div id="update" class="modals">
    <div class="lolz">
    <form action="/tambah" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <a href="#" class="close">&times</a>
        <input type="text" name="menu" placeholder="Nama Menu"><br><br>
        <input type="number" name="harga" placeholder="Harga"><br><br>
        <input type="file" name="gambar"><br><br>
        <button class="btn btn-success">Tambah</button>
    </form>
</div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','.tombol',function(){
            $id_data = $(this).val();
            alert()
        })
    })
</script>
@endsection