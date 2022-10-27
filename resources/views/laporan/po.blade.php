
@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Laporan Harian Cathering</h2>
            <div class="card">
            <div class="card-header">
            <div class="row">  
                <div class="col-lg-1">
                
                </div>
                  <div class="col-lg-6">
                  </div>
                  <div class="col-lg-5">
                      <form class="form-inline" action="/laporanpo" method="POST">
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
        <th scope="col">Nama</th>
        <th scope="col">No Hp</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nama Pesanan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Cash</th>
        <th scope="col">Bank</th>
        <th scope="col">Total Harga</th>
       
        </tr>
    </thead>
    <tbody>
    @php 
            $totalcash = 0;
            $totaldebit = 0;
            $current_date = '';
        @endphp
    @foreach ($data as $dt)
    @if($dt->payment_method != "Piutang")
    @php 
        if($dt->payment_method == "Cash"){
            $totalcash += $dt->transaksi_jumlah;
        }
        if($dt->payment_method == "Debit"){
            $totaldebit += $dt->transaksi_jumlah;
        }
        else{

        }
    @endphp
    @foreach($dt->orderdetailpo as $j => $do)   
    <tr>
        <td>{{ $current_date != $dt->transaksi_date ? $dt->transaksi_date : "" }}</td>
        <td>@if($j==0){{ $dt->no_nota_po }}@endif</td>
        <td>@if($j==0){{ $dt->orderpo->name }}@endif</td>
        <td>@if($j==0){{ $dt->orderpo->contact }}@endif</td>
        <td>@if($j==0){{ $dt->orderpo->addres }}@endif</td>
        <td> - {{ $do->nama_menu }}<br></td>
        <td>{{ $do->jumlah }}</td>
        <td>@if($j==0){{ $dt->payment_method == "Cash" ? $dt->transaksi_jumlah : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method == "Debit" ? $dt->transaksi_jumlah : "" }}@endif</td>
        <td>@if($j==0){{ $dt->transaksi_jumlah }}@endif</td>
        @php 
            $current_date = $dt->transaksi_date
        @endphp
        @endforeach
        @endif
        @endforeach
        <tr>
        <td colspan="7">Jumlah</td>
        <td>{{ $totalcash }}</td>
        <td>{{ $totaldebit }}</td>
        <td>{{ $totalcash + $totaldebit }}</td>
    </tr>
    </tbody>
</table>
<a href="{{ url('/exportlaporanpo/' . (isset($datefrom) ? $datefrom : '-') . '/' . (isset($dateto) ? $dateto : '-') ) }}" class="btn btn-primary mb-2 float-right"><i class="fa fa-download" aria-hidden="true"></i></a>
                </div>
            </div>
    </section>
    </div>
</div>
@endsection