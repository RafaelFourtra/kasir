@php
    $akumulasiPenjualan = 0;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Laporan Bulanan Cathering</title>
</head>
<body>

<h3 class="text-center">Laporan Bulanan Cathering</h3>
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
</body>
</html>