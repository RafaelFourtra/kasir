@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Transaksi</h2>
            <div class="card">
            <div class="card-header">
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="card-header">
                                <div class="input-group">
                                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="searcher"/>
                                   
                                </div>
                                <ul class="myList">
                                        <li><a href=""> Minuman</a></li>
                                    </ul>
                        </div>
                        <form action="{{ route('penjualan.store') }}" method="post">
                            @csrf
                        <div class="card-body">
                        <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th></th>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Total</th>
                                        <th><a href="#" class="btn btn-sm btn-success  rounded-circle" id="add_order"><i class="fa fa-plus-circle"></i></a></th>

                                        </tr>
                                    </thead>
                                    <tbody class="addMoreOrder">
                                        <tr>
                                        <td>1</td>
                                        <td>
                                        <select class="form-control id_produk" id="id_produk" name="id_produk[]">
                                            <option value="">Select Item</option>
                                            @foreach($produks as $produk)
                                                <option data-harga='{{ $produk->harga_jual }}'  value='{{ $produk->id_produk }}'>{{ $produk->nama_produk }}</option> 
                                            @endforeach 
                                        </select>
                                        </td>
                                        <td>
                                            <input type="number" name="jumlah[]" id="jumlah" class="form-control jumlah">
                                        </td>
                                        <td>
                                            <input type="number" name="harga[]" id="harga" class="form-control harga">
                                        </td>
                                        <td>
                                            <input type="number" name="total_harga[]" id="total_harga" class="form-control total_harga">
                                        </td>
                                        <td>
                                        <a href="" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a>
                                        </td>
                                        </tr>
                                    </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-header">
                                <h4>Total <b class="total">0.00</b></h4>
                            </div>
                            <input type="hidden" name="transaksi_jumlah" class="total-input">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_name">Nama Pelanggan</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name">
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_contact">Contact Pelanggan</label>
                                        <input type="number" class="form-control" id="customer_contact" name="customer_contact">
                                    </div>
                                    </div>
                                </div>
                                <h6>Metode Pembayaran</h3>
                                <div class="row">
                                    <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="Cash" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Cash
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="Debit" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Debit
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="Piutang" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Piutang
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                    <div class="form-group mt-4">
                                        <label for="payment">Pembayaran</label>
                                        <input type="number" class="form-control" name="payment" id="payment">
                                    </div>
                                    <div class="form-group">
                                        <label for="returning_charge">Kembalian</label>
                                        <input type="number" class="form-control  bg-light text-dark" name="returning_charge" id="returning_charge" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    </div>
</div>
<div class="modal">
</div>




@include('sweetalert::alert')
@endsection
@section('script')
<script>
        $(".myList").hide();
 
        $('#add_order').on('click', function(e) {
 
        var produk = $(".id_produk").html();
        var numberofrow = ($('.addMoreOrder tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + numberofrow + '</td>' +
            '<td><select class="form-control id_produk" name="id_produk[]">' + produk + '</select></td>' +
            '<td> <input type="number" name="jumlah[]" class="form-control jumlah"></td>' +
            '<td> <input type="number" name="harga[]" class="form-control harga"></td>' +
            '<td> <input type="number" name="total_harga[]" class="form-control total_harga"></td>' +
            '<td><a href="" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a></td>'; 
            $('.addMoreOrder').append(tr);
        });

        $('.addMoreOrder').delegate('.delete', 'click', function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
        });

        function TotalHarga(){
            var total = 0;
            $('.total_harga').each(function(i,e){
                var amount = $(this).val() - 0;
                total += amount;
            });

            $('.total').html(total);
            $('.total-input').val(total);
        };

        $('.addMoreOrder').delegate('.id_produk', 'change', function(){
            var tr = $(this).parent().parent();
            var harga = tr.find('.id_produk option:selected').attr('data-harga');
            tr.find('.harga').val(harga);
            var jumlah = tr.find('.jumlah').val() - 0;
            var harga = tr.find('.harga').val() - 0;
            var total_harga = (jumlah * harga);
            tr.find('.total_harga').val(total_harga);
            TotalHarga();
        });
        
        $('.addMoreOrder').delegate('.jumlah', 'keyup', function(){
            var tr = $(this).parent().parent();
            var harga = tr.find('.id_produk option:selected').attr('data-harga');
            tr.find('.harga').val(harga);
            var jumlah = tr.find('.jumlah').val() - 0;
            var harga = tr.find('.harga').val() - 0;
            var total_harga = (jumlah * harga);
            tr.find('.total_harga').val(total_harga);
            TotalHarga();
        });

        $('#payment').keyup(function() {
            var total = $('.total').html();
            var payment = $(this).val();
            var tot = payment - total;
            $('#returning_charge').val(tot).toFixed(2);
        })


        $("#searcher").keyup(function(){
            $(".myList").hide();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN" : $("meta[name='csrf-token']").attr('content') 
                },
                url: "/searchitem",
                type: "POST",
                data: {
                    "kw" : $("#searcher").val()
                },
                dataType: "json",
                success: function(data){
                    $(".myList").show();
                    var li = data["produk"].map(function(dato,i){
                        return "<li><a href='#' class='produk-list' id_produk="+dato["id_produk"]+">"+dato["nama_produk"]+"</a></li>";
                    }); 

                    $(".myList").html(li);
                },error: function(err){
                    alert(err.responseText);
                }
                
            });
        });


        $(document).on("click",'.produk-list', function(e){
            var id_produk = $(e.target).attr("id_produk");
     
            var produk = $(".id_produk").html();
            var newproduk = " <option value=''>Select Item</option>";
            $('.id_produk option').each(function(){
                if($(this).val().length > 0){newproduk += "<option "+ ($(this).val() == id_produk  ? "selected" : " " )+" data-harga="+$(this).attr("data-harga")+" value="+$(this).val()+">"+$(this).html()+"</option>"; }
            });
          
        var numberofrow = ($('.addMoreOrder tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + numberofrow + '</td>' +
            '<td><select class="form-control id_produk" name="id_produk[]">' + newproduk + '</select></td>' +
            '<td> <input type="number" name="jumlah[]" class="form-control jumlah"></td>' +
            '<td> <input type="number" name="harga[]" class="form-control harga"></td>' +
            '<td> <input type="number" name="total_harga[]" class="form-control total_harga"></td>' +
            '<td><a href="" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a></td>'; 
        $('.addMoreOrder').append(tr);
        });
        $(document).mouseup(function(e) 
        {
            var container = $(".myList");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.hide();
            }
        });

       
       
</script>
@endsection