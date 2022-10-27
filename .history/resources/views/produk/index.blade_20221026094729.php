@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Produk</h2>
            <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($produk as $produks)
                                    <tr>
                                    <th scope="row">{{$produks->id_produk}}</th>
                                    <td>{{$produks->kategori->nama_kategori}}</td>
                                    <td>{{$produks->nama_produk}}</td>
                                    <td>{{number_format($produks->harga_jual)}}</td>
                                    <td><a href="/edit/{{ $produks->id_produk }}" class="btn btn-warning">Edit</a>
                                        <a href="/tambah/{{ $produks->id_produk }}" class="btn btn-danger">Delete</a></td>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="form-group">
        <label for="idkategori" class="form-label">Kategori</label>
            <select class="custom-select" id="idkategori" name="id_kategori">
            @foreach($kategori as $item)
                <option value='{{ $item->id_kategori }}'>{{ $item->nama_kategori }}</option> 
            @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputName">Nama</label>
            <input type="text" name="nama_produk" class="form-control" id="exampleInputName">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Harga</label>
            <input type="number" name="harga_jual" class="form-control" id="exampleInputName">
        </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

@isset($dataspro)
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/update/{{ $dataspro->id_produk }}" method="POST">
        @csrf
        <div class="form-group">
        <label for="idkategori" class="form-label">Kategori</label>
            <select class="custom-select" id="idkategori" name="id_kategori">
            @foreach($kategori as $item)
                <option value='{{ $item->id_kategori }}'>{{ $item->nama_kategori }}</option> 
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Nama</label>
            <input type="text" name="nama_produk" class="form-control" id="exampleInputName" value="{{ $dataspro->nama_produk}}">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Harga</label>
            <input type="number" name="harga_jual" class="form-control" id="exampleInputName" value="{{ $dataspro->harga_jual }}">
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

<script>
$(document).ready(function(){
      $("#exampleModal").modal("show");
});
</script> 
@include('sweetalert::alert')
@endsection