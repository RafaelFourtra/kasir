<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Laporan Harian Cafe</title>
</head>
<body>

<h3 class="text-center">Laporan Harian Cafe</h3>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">No</th>
        <th scope="col">Cash</th>
        <th scope="col">Bank</th>
        <th scope="col">Total</th>
       
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
    <tr>
        <td>@if($dt->payment_method != "Piutang"){{$current_date != $dt->transaksi_date ? $dt->transaksi_date : "" }}@endif</td>
        <td>{{ $dt->payment_method != "Piutang" ? $dt->no_nota : ""}}</td>
        <td>{{ $dt->payment_method == "Cash" ? $dt->transaksi_jumlah : "" }}</td>
        <td>{{ $dt->payment_method == "Debit" ? $dt->transaksi_jumlah : "" }}</td>
        </tr>
        
        @php 
            $current_date = $dt->transaksi_date
        @endphp
        @endforeach
        <tr>
        <td colspan="2">Jumlah</td>
        <td>{{ $totalcash }}</td>
        <td>{{ $totaldebit }}</td>
        <td>{{ $totalcash + $totaldebit }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>