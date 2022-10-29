@extends('layouts.master')
@section('content')

<style>
    .lol{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.8);
        visibility: visible;
        opacity: 0;
        transition: 500ms;
    }

    .lol:target{
        visibility: visible;
        opacity: 1;
    }
</style>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Nota</th>
                    <th scope="col">Total</th>
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
                    <td>Rp.{{number_format($key->total_transaksi)}}</td>
                    <td>
                        <a href="#detail"><button class="btn btn-primary tombol" value="{{$key->id}}">Detail</button></a>
                        <a href="#update"><button class="btn btn-warning tombol" value="{{$key->id}}">Edit</button></a>
                        <a href="/riwayat/{{$key->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                </tbody>
        </table>

        <div id
        </div>
    </div>
</div>


@endsection