
@extends('layouts.master')
@section('content')
@php
$akumulasiPenjualan = 0;
@endphp
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Laporan Bulanan Cafe</h2>
            <div class="card">
            <div class="card-header">
            <div class="row">  
                <div class="col-lg-1">
                
                </div>
                  <div class="col-lg-6">
                  </div>
                  <div class="col-lg-5">
                      <form class="form-inline" action="/laporanbulanan" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="datefrom" class="mx-1">From</label>
                            <input type="date"  id="datefrom" class="form-control" name="datefrom">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="dateto" class="mx-1">To</label>
                            <input type="date"  id="dateto" class="form-control" name="dateto">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </form>
                  </div>
                </div>
            </div>
                <div class="card-body">
    
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Cash</th>
        <th scope="col">Bank</th>
        <th scope="col">Total</th>
        <th scope="col">Akumulasi Penjualan</th>
        </tr>
    </thead>
    <tbody>
       
    @foreach ($data as $dt)
    @php
            $akumulasiPenjualan += $dt["total"];
        @endphp
    <tr>
        <td>{{ $dt["tanggal"]}}</td>
        <td>{{ $dt["cash"] }}</td>
        <td>{{ $dt["bank"] }}</td>
        <td>{{ $dt["total"]}}</td>
        <td>{{ $akumulasiPenjualan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('/exportlaporanbulanan/' . (isset($datefrom) ? $datefrom : '-') . '/' . (isset($dateto) ? $dateto : '-') ) }}" class="btn btn-primary mb-2 float-right"><i class="fa fa-download" aria-hidden="true"></i></a>
                </div>
            </div>
    </section>
    </div>
</div>
@endsection