@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Penjualan</h2>
            <div class="card">
            <div class="card-header">
            <div class="row">  
                <div class="col-lg-1">
                <a href="{{ route('penjualan.index') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                  <div class="col-lg-6">
                  </div>
                  <div class="col-lg-5">
                      <form class="form-inline" action="/searchfromdate" method="GET">
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
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah Produk</th>
                                    <th scope="col">Metode</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Kembalian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi as $trans)
                                    <tr>
                                    <td>{{$trans->no_nota}}</td>
                                    <td>{{$trans->transaksi_date}}</td>
                                    <td>{{$trans->nama}}</td>
                                    <td>{{$trans->orderdetail->count()}}</td>
                                    <td>{{$trans->payment_method}}</td>
                                    <td>{{number_format($trans->transaksi_jumlah)}}</td>
                                    <td>{{number_format($trans->payment)}}</td>
                                    <td>{{number_format($trans->returning_charge)}}</td>
                                    <td>
                                    @if($trans->payment_method == "Piutang")
                                    {{'Belum Lunas'}}
                                    @elseif($trans->payment_method == "cancel")
                                    {{'Cancel'}}
                                    @else
                                    {{'Lunas'}}
                                    @endif
                                    </td>
                                    @if($trans->payment_method != "cancel")
                                      ccc
                                        @if($trans->payment_method == "Piutang")<a href="/edittrans/{{ $trans->id }}" class="btn btn-warning" id="edittrans">Edit</a> @endif
                                        <a href="{{url('/canceltrans/'.$trans->id)}}" class="btn btn-danger canceltrans" kode_trans="{{$trans->id}}" id="canceltrans">Cancel</a>
                                        @if($trans->payment_method != "Piutang")<a  href="{{url('/riwayatpenjualan/cetakstruk/'.$trans->id)}}" class="btn btn-primary" id_nota="{{$trans->id}}"><i class="fa fa-print"></i>@endif</td>
                                      @else
                                      <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>
</div>

@isset($detailorder)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detailorder as $detail)
                                        <tr>
                                        <td>{{ $detail-> produk -> nama_produk}}</td>
                                        <td>{{ $detail-> jumlah}}</td>
                                        <td>{{ number_format($detail->harga)}}</td>
                                        <td>{{  number_format($detail->total_harga)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                        </table>        
      </div>
    </div>
  </div>
</div>


@endisset
@isset($datatransaksi)
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/updatetrans/{{ $datatransaksi->id }}" method="POST">
        @csrf
      <div class="form-group">
      <label for="date_payment">Tanggal Pembayaran</label>
      <input type="date"  id="date_payment" class="form-control" name="transaksi_date" value="{{ $datatransaksi->transaksi_date }}">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select class="custom-select" id="payment_method" name="payment_method">
                <option value='Piutang'>Piutang</option> 
                <option value='Cash'>Cash</option> 
                <option value='Debit'>Debit</option> 
            </select>
            <label for="payment">Pembayaran</label>
            <input type="number" class="form-control" name="payment" id="payment" value="{{ $datatransaksi->payment}}">
            <label for="returning_charge">Kembalian</label>
            <input type="number" class="form-control" name="returning_charge" id="returning_charge" value="{{ $datatransaksi->returning_charge}}">          
        </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endisset
@isset($lastIDorder)
<div id="print" style="visibility: hidden;">
 @include('reports.receipt')
</div>
<script>
    
    var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block; width:100%; border:none; background-color: #008B8B; color:#fff; padding: 14px 28px; font-size:16px; cursor:pointer; text-align:center" value="Print Receipt"" onClick="window.print()">';
                data += document.getElementById("print").innerHTML;
           
              
                myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
              
                    myReceipt.screenX = 0;
                    
                    myReceipt.screenY = 0;
                    myReceipt.document.write(data);
                    myReceipt.document.title = "Print Receipt";
                  
                myReceipt.focus();
                setTimeout(() => {
                    myReceipt.close();
                },20000);

          
    
</script>
@endisset

<script>
$(document).ready(function(){
      $("#exampleModal").modal("show");
      $("#exampleModal1").modal("show");
});


</script>
@include('sweetalert::alert')

<script>
  $(".canceltrans").click(function(e){
    e.preventDefault();
    let confirmcancel = confirm("apakah anda yakin ingin mencancel?");
    if(confirmcancel){
      window.location = $(this).attr("href");
    }
  });
</script>
@endsection
