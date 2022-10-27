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
        margin-left: 3rem;
        width: 300px;
    }

    .tulisan{
        position: absolute;
        background: rgba(0,0,0,0.8); 
        font-size: 30px;
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
        width: 550px;
        border-radius: 20px;
    }
    .container{
        margin-left: -2rem;
    }

    .checkbox,.individual{
         visibility: hidden;
   }
    @media(max-width: 800px){
        *{
            position:relative;
        }
        h2.total{
            margin-left: 230px; 
        }
        .container{
            height: 100px;
            margin-left: 150px; 
            margin-top: 120px;
        }

        form{
            height: 8000rem;
        }

   img{
    margin-top: -50px;
   }
    }
</style>
<div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
        <h2 class="pembuka">Selamat Datang Pelanggan Setia Silahkan Pilih Pesanan Anda</h2><br>
        <form action="/tampil" method="POST" id="our-form">
            <h2 class="total">Total: Rp. <span id="checked-sum">0</span> <button class="btn btn-success" style="margin-top: ">&#10004</button></h2><br><br>
            @php
                $no = 1;
                $no2 = 1;
            @endphp
            @csrf
        <div class="container">
            <br>
            @foreach($menu as $key)
            <label for="{{$no}}">
            <img src="{{asset('uploads/menu/'.$key->gambar)}}">
            <h2 class="tulisan">{{$key->menu}} <br>Rp.{{number_format($key->harga)}}</h2>
            <input type="checkbox" name="harga" value="{{$key->harga}}" id="{{$no++}}" class="checkbox">   
        </label>
            <br><br><br><br><br><br><br><br><br>
            @endforeach
        </div>
    </form>
    </div>
    <div class="col-lg-4">

    </div>
</div>

<script>

    var
	$form = $("#our-form"),
  $allCheckboxes = $("input:checkbox", $form),
  $sumOut = $("#checked-sum"),
  $countOut = $("#checked-count");
  
$allCheckboxes.change(function() {
	var sum = 0,
      count = 0;
  
	$allCheckboxes.each(function(index, el) {
  	var $el = $(el);
    
  	if ($el.is(":checked")) {
    	count++;
      
      val = parseFloat($el.val());
      if (!isNaN(val)) {
      	sum += val;
      }
    }
    
  });
  
  $sumOut.text(sum);
  $countOut.text(count);
});
  
  
</script>
@endsection
