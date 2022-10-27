@extends('layouts.master')
@section('content')
    <h2 style="margin-left: 550px; margin-top: 30px">Selamat Datang User Silahkan Pilih Pesanan Anda</h2>
    <h2 style="margin-left: 60rem">Total: 0</h2>
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
                   
            </table>
            </div>
        </div>
    </div>
@endsection