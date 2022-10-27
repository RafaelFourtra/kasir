@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">User</h2>
            <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No</th>
                                    
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    </tr>
                                </thead>
                              
                                
                                <tbody>
                                @foreach($user as $i => $us)
                                    <tr>
                                    <th scope="row">{{$i+=1}}</th>
                                    <td>{{$us->username}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->display_name}}</td>

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
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="hidden" value="registerwithothermenu" name="rwom" >
      <div class="form-group">
            <label for="exampleInputName">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" id="exampleInputName">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
        <label for="inputGroupSelect04">Level User</label>
          <select class="form-control" id="inputGroupSelect04" name="role_id">
            <option selected>Choose...</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection