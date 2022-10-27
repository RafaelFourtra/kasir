@extends('layouts.master')
@section('content')
<style>
    .pembuka{
        font-size: 20px; text-align: center; margin-top: 10px;
    }

    .total{
        background: #fff; 
        text-align: center; 
        position: fixed; 
        margin-left: 8rem;
        width: 150px;
    }

    .tulisan{
        background: black; 
        color: white; 
        width: 10rem; 
        text-align:center;
        margin-left: 115px; 
        margin-top: 10rem;
    }

    @media(max-width: 800px){
        h2.total{
            margin-left: 
        }
    }
</style>
<div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
        <h2 class="pembuka">Selamat Datang User Silahkan Pilih Pesanan Anda</h2><br>
        <h2 class="total">Total: 0</h2><br><br>
        <div>
            <h2 class="tulisan" style="">Spageti</h2>
            <img src="https://asset.kompas.com/crops/3ZgLdJlFUkTbStaLZXcQ2WiAVCk=/0x0:1000x667/750x500/data/photo/2019/01/01/3277474477.jpg" style="margin-left: 80px; height: 300px">
        </div>
    </div>
    <div class="col-lg-4">

    </div>
</div>
@endsection
