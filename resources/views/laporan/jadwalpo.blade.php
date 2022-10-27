
@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Laporan Jadwal Cathering</h2>
            <div class="card">
            <div class="card-header">
            <div class="row">  
                <div class="col-lg-1">
                
                </div>
                  <div class="col-lg-6">
                  </div>
                  <div class="col-lg-5">
                      <form class="form-inline" action="/laporanjadwalpo" method="POST">
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
        <th scope="col">No</th>
        <th scope="col">Nama Pesanan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Pembayaran</th>
        <th scope="col">Keterangan</th>
       
        </tr>
    </thead>
    <tbody>
    @php   
            $current_date = '';
    @endphp
    @foreach ($data as $dt)
    @foreach($dt->orderdetailpo as $j => $do)   
    <tr>
        <td>{{ $current_date != $dt->transaksi_date ? $dt->transaksi_date : "" }}</td>
        <td>@if($j==0){{ $dt->no_nota_po }}@endif</td>
        <td> - {{$do->nama_menu}}<br></td>
        <td>{{ $do->jumlah}}</td>
        <td>@if($j==0){{ $dt->payment_method }}@endif</td>
        <td>@if($j==0){{$dt->payment_method == "Piutang" ? 'Belum Lunas' : 'Lunas'}}@endif</td>
</tr>
        @php 
            $current_date = $dt->transaksi_date
        @endphp
        @endforeach
        @endforeach
    </tbody>
</table>
<a href="{{ url('/exportlaporanjadwalpo/' . (isset($datefrom) ? $datefrom : '-') . '/' . (isset($dateto) ? $dateto : '-') ) }}" class="btn btn-primary mb-2 float-right"><i class="fa fa-download" aria-hidden="true"></i></a>
                </div>
            </div>
    </section>
    </div>
</div>
@endsection