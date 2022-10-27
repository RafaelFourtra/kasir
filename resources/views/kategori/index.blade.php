@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Kategori</h2>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($data as $row)
                                    <tr>
                                    <th scope="row">{{ $row->id_kategori }}</th>
                                    <td>{{ $row->nama_kategori }}</td>
                                    <td><a href="/editkategori/{{ $row->id_kategori }}" class="btn btn-warning">Edit</a>
                                        <a href="/deletekategori/{{ $row->id_kategori }}" class="btn btn-danger">Delete</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
      <div class="form-group">
            <label for="exampleInputName">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" id="exampleInputName">
        </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

@isset($datas)
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
      <form action="/update/{{ $datas->id_kategori }}" method="POST">
        @csrf
      <div class="form-group">
            <label for="exampleInputName">Nama</label>
            <input type="text" name="nama_kategori" class="form-control" id="exampleInputName" value="{{ $datas->nama_kategori }}">
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