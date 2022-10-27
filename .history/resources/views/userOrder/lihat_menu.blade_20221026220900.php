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
        width: 180px;
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
    cursor: pointer;
    transform: scale(1.25);
    -webkit-transform: scale(1.25);
   }
    @media(max-width: 900px){
        h2.total{
            margin-left: 290px; 
        }
        .container{
            height: 120px;
            margin-left: 150px;
        }
    }
</style>
<div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
        <h2 class="pembuka">Selamat Datang User Silahkan Pilih Pesanan Anda</h2><br>
        <h2 class="total">Total: <span id="checked-sum">0</span></h2><br><br>
        <form action="" id="our-form">
            @csrf
        <div class="container">
            @foreach($menu as $key)
            <img src="{{asset('uploads/menu/'.$key->gambar)}}">
            <h2 class="tulisan">{{$key->menu}} Rp.{{number_format($key->harga)}}</h2>
            <input type="checkbox" value="{{$key->harga}}" id="toggle" class="checkbox">
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
