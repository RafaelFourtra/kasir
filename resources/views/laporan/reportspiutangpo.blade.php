<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Laporan Piutang</title>
</head>
<body>

<h3 class="text-center">Laporan Piutang</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Total Harga</th>
       
        </tr>
    </thead>
    <tbody>
    @foreach ($data as $dt)
    @if($dt->payment_method == "Piutang")
    <tr>
        <td>{{ $dt->transaksi_date }}</td>
        <td>{{ $dt->no_nota_po }}</td>
        <td>{{ $dt->payment_method == "Piutang" ? $dt-> orderpo -> name : "" }}</td>
        <td>{{ $dt->payment_method == "Piutang" ? $dt->transaksi_jumlah : "" }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</body>
</html>