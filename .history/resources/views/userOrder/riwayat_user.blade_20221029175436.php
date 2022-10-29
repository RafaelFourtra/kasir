@extends('layouts.master')
@section('content')
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
                    <td>Rp.{{$key->total_transaksi}}</td>
                    <td><a href="#update"><button class="btn btn-warning tombol" value="{{$key->id}}">Edit</button></a>
                        <a href="/riwayat/{{$key->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                
                </tbody>
        </table>
        </div>
    </div>
</div>
@endsection