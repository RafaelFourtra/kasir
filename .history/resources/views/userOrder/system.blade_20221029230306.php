<div class="card-body">
    <div class="row">
        <div class="col-lg-12" id="table">
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
                  {{-- @foreach($transaksi as $data)
                    <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$data->no_nota}}</td>
                    <td>{{$data->total_transaksi}}</td>
                    <td><a href="/detail/{{$data->id}} #detail"><button class="btn btn-primary tombol">Detail</button></a>
                        <a href="/riwayat/{{$data->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach --}}
                
                </tbody>
        </table>
        </div>
    </div>
</div>

@isset($detailorder)
<div id="detail" class="modals">
    <div class="lolz">
        <a href="#" class="close">&times</a>
        <table class="table table-striped" style="width: 50rem; background: white;">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Kwantitas</th>
                <th scope="col">Total Harga</th>
                </tr>

            <tbody>
                @php
                    $no = 1;
                @endphp
            @foreach($detailorder as $key)
                <tr>
                <th scope="col">{{$no++}}</th>
                <th scope="col">{{$key->user_order->menu}}</th>
                <th scope="col">{{$key->harga}}</th>
                <th scope="col">{{$key->kwantitas}}</th>
                <th scope="col">{{$key->total_harga}}</th>
                </tr>
            @endforeach
            </tbody>
            </thead>
        </table>
    </div>
</div>
@endisset