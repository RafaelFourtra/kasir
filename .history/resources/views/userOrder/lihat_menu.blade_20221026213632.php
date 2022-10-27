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
        position: absolute;
        background: rgba(0,0,0,0.8); 
        font-size: 50px;
        height: 140px;
        width: 100%;
        border-radius: 5px;
        color: white; 
        width: 20rem; 
        text-align:center;
        margin-left: 82px; 
        margin-top: -18rem;
    }
    img{
        position: relative;
        margin-left: -70px; 
        margin-top: 5rem;
        height: 400px;
        border-radius: 20px;
    }
    .container{
        margin-left: -3rem;
    }
   .checkbox{
    position: absolute;
    margin-top:-26rem;
    height: 5em;
    width: 5em;
    margin-left: 28rem;
   }
    @media(max-width: 900px){
        h2.total{
            margin-left: 290px; 
        }
        .container{
            height: 120px;
            margin-left: 120px;
        }

        
    }
</style>
<div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
        <h2 class="pembuka">Selamat Datang User Silahkan Pilih Pesanan Anda</h2><br>
        <h2 class="total">Total: <span id="checked-sum">0</span></h2><br><br>
        <div class="container">
            <img src="https://www.topwisata.info/wp-content/uploads/2022/02/Spaghetti-Saus-Tomat-Sosis-1-930x620.jpg">
            <h2 class="tulisan">Spageti Rp.35.000</h2>
            <input type="checkbox" id="toggle" class="checkbox">
        </div>
    </div>
    <div class="col-lg-4">

    </div>
</div>
@endsection
