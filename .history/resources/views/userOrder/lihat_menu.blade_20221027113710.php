@extends('layouts.master')
@section('content')
<style>
    h2.pembuka{
        margin-left: 30rem;
    }
    h2.total{
        margin-left: 50rem;
        background: #fff;
        width: 290px;
        text-align: center;
    }

    img{
        height: 120px;
        margin-left: 2rem;
        width: 220px;
    }
    h2.tulisan{
        margin-left: 30px;
    font-size: 20px;
    text-align: center;
    margin-top: -6rem;
    color: #845d41;
    background: #fff;
    position: absolute;
    margin-left: 45px;
    opacity: 0.9;
    width: 190px;
    }
</style>
        <h2 class="pembuka">Selamat Datang Pelanggan Setia Silahkan Pilih Pesanan Anda</h2><br>
        <form class="our-form">
            <h2 class="total">Total: Rp. <span class="checked-sum">0</span> <a href="#tambah"><button class="btn btn-success">&#10004</button></h2><br><br></a>
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
                        </label>
                        <input type="checkbox" name="harga" value="{{$key->harga}}" id="{{$no++}}" class="checkbox">
                        @endforeach


            </div>
        </form>

        <div id="tambah" class="tambah_riwayat">
            <form action="" method="" class="our-form">
                @csrf
                
                <input type="text" class="checked-sum" placeholder="Total">
                <input type="text" class="bayar" placeholder="Pembayaran">
                <input type="text" class="checked-sum kembalian" placeholder="Kembalian">
            </form>
        </div>
<script>
    $(document).ready(function(){
        $(".bayar,.kembalian").keyup(function(){
            var total=0;
            var x = Number($(".bayar"))
        })
    })
    var
        $form = $(".our-form")
        , $allCheckboxes = $("input:checkbox", $form)
        , $sumOut = $(".checked-sum")
        , $countOut = $("#checked-count");

    $allCheckboxes.change(function() {
        var sum = 0
            , count = 0;

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
        $sumOut.val(sum);
        $countOut.text(count);
    });

</script>
@endsection
