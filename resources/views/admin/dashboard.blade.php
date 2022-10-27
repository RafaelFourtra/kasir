@extends('layouts.master')
@section('content')
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
            <h1 class="text-center" style="margin-top:18%;">Welcome {{auth()->user()->name}} !</h1>
        </section>                   
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->


@endsection




