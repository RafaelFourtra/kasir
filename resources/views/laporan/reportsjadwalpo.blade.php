<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Laporan Jadwal Cathering</title>
</head>
<body>

<h3 class="text-center">Laporan Jadwal Cathering</h3>
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
</body>
</html>