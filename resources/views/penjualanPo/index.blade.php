@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
        <h2 class="p-1">Transaksi Cathering</h2>
            <div class="card">
            <div class="card-header">
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="card-header">
                        </div>
                        <form action="{{ route('penjualanpo.store') }}" method="post">
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
                                             <input type="text" name="nama_menu[]" id="nama_menu" class="form-control nama_menu">
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
                                    <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_name">Nama Pelanggan</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name">
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_address">Alamat Pelanggan</label>
                                        <input type="text" class="form-control" id="customer_address" name="customer_address">
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
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
 
        var numberofrow = ($('.addMoreOrder tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + numberofrow + '</td>' +
            '<td> <input type="text" name="nama_menu[]" id="nama_menu" class="form-control nama_menu"></td>' +
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

        function TotalHarga(tr){
            var harga = tr.find('.harga').val();
            var jumlah = tr.find('.jumlah').val();
            var totalHarga = tr.find('.total_harga');
            totalHarga.val(harga*jumlah);

            var total = 0;
            $('.total_harga').each(function(i,e){
                var amount = $(this).val() - 0;
                total += amount;
            });

            $('.total').html(total);
            $('.total-input').val(total);
        };

        $('.addMoreOrder').delegate('.nama_menu', 'change', function(){
            var tr = $(this).parent().parent();
            var harga = tr.find('.nama_menu');
            tr.find('.harga').val(harga);
            var jumlah = tr.find('.jumlah').val() - 0;
            var harga = tr.find('.harga').val() - 0;
            var total_harga = (jumlah * harga);
            tr.find('.total_harga').val(total_harga);
            TotalHarga();
        });
        
        $('.addMoreOrder').delegate('.jumlah', 'keyup', function(){
            var tr = $(this).parent().parent();
            TotalHarga(tr);
            
        });

        $('.addMoreOrder').delegate('.harga', 'keyup', function(){
            var tr = $(this).parent().parent();
            TotalHarga(tr);

        });

        $('#payment').keyup(function() {
            var total = $('.total').html();
            var payment = $(this).val();
            var tot = payment - total;
            $('#returning_charge').val(tot).toFixed(2);
        })



       
       
</script>
@endsection