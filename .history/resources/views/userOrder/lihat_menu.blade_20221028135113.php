@extends('layouts.master')
@section('content')


<style>
    h2.pembuka{
        margin-left: 30rem;
    }
    h2.total{
        margin-left: 45rem;
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
    .checkbox{
        visibility: visible;
    }
    .tambah_riwayat{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom:0;
        background: rgba(0,0,0,0.8);
        visibility: hidden;
        opacity: 0;
        transition: 500ms;
    }
    .tambah_riwayat:target{
        visibility: visible;
        opacity: 1;
    }
    .isian{
        margin-top: 2rem;
        margin-left: 10rem;
        color: white;
    }

    input.uang{
        height: 48px;
        width: 300px;
        border-radius: 5px;
        border: none;
    }
</style>
        <h2 class="pembuka">Selamat Datang Pelanggan Setia Silahkan Pilih Pesanan Anda</h2><br>
        <div class="">
            <h2 class="total">Total: Rp. <span class="checked-sum">0</span></h2>
            <a href="#tambah"><button class="btn btn-success" style="margin-left: 38rem">&#10004</button><br><br></a>
        </div>
        <form class="our-form">
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
                        <input type="checkbox" onclick="checkMe(this.id)" name="data" value="{{$key->harga}}" id="{{$no++}}" class="checkbox">
                        @endforeach
            </div>

        </form>
        {{-- MODAL --}}
        <div id="tambah" class="tambah_riwayat">
            <div class="isian">
                <a href="#" class="close" style="color: white; font-size: 120px; margin-left: 84rem; opacity: 1; transition: 0.3s;">&times</a>
            <form action="" method="POST" class="our-form" align="center" name="frm">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped" style="width: 28rem; margin-left: 25rem;">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Kwantitas</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <tbody id="msg" style="display: none">
                                        <tr>
                                        <td>1</td>
                                        <td>Spageti</td>
                                        <td>2</td>
                                        <td>5000</td>
                                        <td>10000</td>
                                    </tr>
                                    </tbody>
                                </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        
<script>

function checkMe(id,pid){
    var cb = document.getElementById(id);
    var text = document.getElementById(pid);
    if(cb.checked==true){
        text.style.display="block";
    }else{
        text.style.display="none";
    }
   }

    $(document).ready(function(){
        $(".bayar,.kembalian").keyup(function(){
            var total=0;
            var x = Number($(".bayar").val());
            var y = Number($(".kembalian").val());
            var total=x - y;
            $('#total').val(total);
        })
    });
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
