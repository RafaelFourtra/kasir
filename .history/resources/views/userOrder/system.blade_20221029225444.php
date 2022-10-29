<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">No</th>
        <th scope="col">No Nota</th>
        <th scope="col">Total Harga</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    <tbody>
      @foreach($transaksi as $data)
        <tr>
        <th scope="row">{{$no++}}</th>
        <td>{{$data->no_nota}}</td>
        <td>{{$data->total_transaksi}}</td>
        <td><a href="/detail/{{$data->id}} #detail"><button class="btn btn-primary tombol">Detail</button></a>
            <a href="/riwayat/{{$data->id}}" class="btn btn-danger">Delete</a></td>
        </tr>
      @endforeach
    
    </tbody>
</table>