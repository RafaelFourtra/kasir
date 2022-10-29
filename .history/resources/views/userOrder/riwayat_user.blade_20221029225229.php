@extends('layouts.master')
@section('content')
<script src="https://bit.ly/javascript"></script>
<style>
    .modals{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        visibility: hidden;
        opacity: 0;
        background: rgba(0,0,0,0.8);
        transition: 500ms;
    }

    .modals:target{
        opacity: 1;
        visibility: visible;
    }

    .lolz{
        margin-left: 30rem;
        margin-top: 10rem;
    }

    .close{
        color: white; 
        opacity: 1;
        margin-top: -5rem;
        font-size: 50px;
        margin-right: 25px;
    }
    .close:hover{
        color: black;
        opacity: 1;
        transition: 0.3s;
    }

    @media(max-width: 700px){
        .modals{
            margin-left: 20rem;
        }   
    }
</style>

<body onLoad="table();">
<div class="card-body">
    <div class="row">
        <div class="col-lg-12" id="table">
            <script type="text/javascript">
                function table(){
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        document.getElementById("table").innerHTML = this.responseText;
                    }

                    xhttp.open("GET","/system")
                }
            </script>
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
</body>
@endsection