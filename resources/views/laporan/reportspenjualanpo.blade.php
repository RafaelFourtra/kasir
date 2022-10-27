<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Laporan Harian Cathering</title>
</head>
<body>

<h3 class="text-center">Laporan Harian Cathering</h3>
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
        <td>@if($dt->payment_method != "Piutang"){{ $current_date != $dt->transaksi_date ? $dt->transaksi_date : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method != "Piutang" ? $dt->no_nota_po : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method != "Piutang" ? $dt->orderpo->name : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method != "Piutang" ? $dt->orderpo->contact : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method != "Piutang" ? $dt->orderpo->addres : "" }}@endif</td>
        <td> - {{$dt->payment_method != "Piutang" ? $do->nama_menu : "" }}<br></td>
        <td>{{$dt->payment_method != "Piutang" ? $do->jumlah : "" }}</td>
        <td>@if($j==0){{ $dt->payment_method == "Cash" ? $dt->transaksi_jumlah : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method == "Debit" ? $dt->transaksi_jumlah : "" }}@endif</td>
        <td>@if($j==0){{ $dt->payment_method != "Piutang" ? $dt->transaksi_jumlah : "" }}@endif</td>
        @php 
            $current_date = $dt->transaksi_date
        @endphp
        @endforeach
        @endforeach
        <tr>
        <td colspan="7">Jumlah</td>
        <td>{{ $totalcash }}</td>
        <td>{{ $totaldebit }}</td>
        <td>{{ $totalcash + $totaldebit }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>