@extends('layouts.master')
@section('content')
<style>
 img{
    height: 70px;
 }
</style>
        <h2 class="pembuka">Selamat Datang Pelanggan Setia Silahkan Pilih Pesanan Anda</h2><br>
        <form action="/tampil" method="POST" id="our-form">
            <h2 class="total">Total: Rp. <span id="checked-sum">0</span> <button class="btn btn-success">&#10004</button></h2><br><br>
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
        $form = $("#our-form")
        , $allCheckboxes = $("input:checkbox", $form)
        , $sumOut = $("#checked-sum")
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
        $countOut.text(count);
    });

</script>
@endsection
