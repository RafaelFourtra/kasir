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


            $no14 = 8;

            //Kwantitas
            $no12 = 2000;
            $no13 = 2000;

             //Total Harga
             $no10 = 3000;
             $no11 = 3000;
             $no15 = 8001;
             $no16 = 3002;
             $no17 = 3002;

             //Total Harga2
             $no18 = 7000;
             $no20 = 5000;
            //Modal
            $no = 1;
            $no3 = 1;
            // input id harga
            $no2 = 1000;
            $no5 = 1000;
            $no9 = 1000;
            @endphp
            @csrf
            <div class="container">
                <br>
                        @foreach($menu as $key)
                        <label for="{{$no5++}}">
                            <img src="{{asset('uploads/menu/'.$key->gambar)}}">
                            <h2 class="tulisan">{{$key->menu}} <br>Rp.{{number_format($key->harga)}}</h2>
                            <input type="checkbox" onclick="checkMe(this.id,'{{$no++}}')" name="data" value="{{$key->harga}}" id="{{$no2++}}" class="checkbox">
                        </label>
                        @endforeach
            </div>

        </form>
        {{-- MODAL --}}
        <div id="tambah" class="tambah_riwayat">
            <div class="isian">
                <a href="#" class="close" style="color: white; font-size: 120px; margin-left: 84rem; opacity: 1; transition: 0.3s;">&times</a>
                
            <form action="/tampil" method="POST" align="center" name="frm">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped" style="width: 28rem; margin-left: 25rem;">
                                    @foreach($menu as $key)
                                    <tbody id="{{$no3++}}" style="display: none; margin-left: 5rem;">
                                        <tr>
                                        <td><input type="hidden" name="id_menu" value="{{$key->id}}"></td>
                                        <td><input type="checkbox" id="menu" name="menu" value="{{$key->menu}}" checked>{{$key->menu}}</td>
                                        <td><input name="jumlah_pesanan" type="number" id="{{$no12++}}" style="width: 50px;text-align: center;" value="1"></td>
                                        <td><input type="checkbox" name="harga" class="harga" value="{{$key->harga}}" checked>Rp.{{number_format($key->harga)}}</td>
                                        <td><b>Rp.</b><input type="checkbox" name="total" id="{{$no15++}}" value="{{$key->harga}}" checked><b name="total" id="{{$no10++}}">{{number_format($key->harga)}}</b></td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                    <input type="text" id="{{$no18}}" value="0" checked><b>Total: <b id="{{$no20}}">0</b></b>
                                </tbody>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" style="margin-right: 8rem">Pesan</button>
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
        $("#{{$no13}},#{{$no9}}").keyup(function(){
            var total=0;
            var total_pesanan = 0;
            var x = Number($("#{{$no13++}}").val());
            var y = Number($("#{{$no9++}}").val());
            var total=x *  y;
            var pesan = total_pesanan + total;

            $('#{{$no11++}}').html(total);
            $('#{{$no15++}}').val(total);
            $('#{{$no18++}}').val(pesan);
            $('#{{$no20++}}').html(pesan);
            //alert("lol")
        });

        $("#{{$no13}},#{{$no9}}").keyup(function(){
            var total=0;
            var total_pesanan = 0;
            var x = Number($("#{{$no13++}}").val());
            var y = Number($("#{{$no9++}}").val());
            var total=x *  y;
            var pesan = total_pesanan + total;

            $('#{{$no11++}}').html(total);
            $('#{{$no15++}}').val(total);
            $('#{{$no18++}}').val(pesan);
            $('#{{$no20++}}').html(pesan);
            //alert("lol")
        });
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
