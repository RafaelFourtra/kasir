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
        margin-left: 30rem;
        margin-top: 10rem;
    }

    .close{
        color: white; 
        opacity: 1;
        margin-top: -5rem;
        font-size: 50px;
        margin-right: 25px;
    }
    .close:hover{
        color: black;
        opacity: 1;
        transition: 0.3s;
    }

    @media(max-width: 700px){
        .modals{
            margin-left: 20rem;
        }   
    }
</style>
<h1 style="margin-left: 300px; margin-top: 30px">Riwayat Pemesan</h1><br>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Nota</th>
                    <th scope="col">Total Harga</th>
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
                    <td>{{$key->no_nota}}</td>
                    <td>{{$key->total_transaksi}}</td>
                    <td><a href="/detail/{{$key->id}} #detail"><button class="btn btn-primary tombol">Detail</button></a>
                        <a href="tambah/{{$key->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                
                </tbody>
        </table>
        </div>
    </div>
</div>

@isset($detailorder)
<div id="detail" class="modals">
    <div class="lolz">
        <a href="#" class="close">&times</a>
        <table class="table table-striped" style="width: 50rem;">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah Pesanan</th>
                <th scope="col">Total Harga</th>
                </tr>
            </thead>

            @php
                $no = 1;
            @endphp

            <tbody style="background: white;">
                @foreach($detailorder as $key)
                <tr>
                    <th scope="col">{{$no++}}</th>
                    <td scope="col">{{$key->id_menu}}</td>
                    <td scope="col">Harga</td>
                    <td scope="col">Jumlah Pesanan</td>
                    <td scope="col">Total Harga</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endisset
@endsection