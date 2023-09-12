@extends('user.master')


@section('content')

{{-- @include('user.navbar') --}}

@if (session('status'))
    <div class="alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>  {{ session('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
   {{-- <script>
     swal("Good job!", "You clicked the button!", "success")
   </script> --}}
@endif

<section class="header">
    <div class="text-box">
        {{-- <h1>Go big. Live large.</h1>
        <p>Unfold more with an expansive screen and immerse yourself
        in your favorite entertainment <br> no matter where you are with Galaxy Z Fold5.</p>
        <a href="" class="hero-btn">Visit Us To Know More</a> --}}
    </div>
</section>


<section class="mt-5">
    <div class="row">
        <div class="col-md-4 offset-2">
            <h1>View Our Sales</h1>
            <br>
            <span>Sales</span>
            <br>
            <br>
            <h4>See our items</h4>
            <br>
            <h4>Deals made especially for you</h4>
            <br>
            <button class="btn btn-view btn-primary">View Items</button>
        </div>
        <div class="col-md-4 offset-2">
            <img src="{{ asset('img/3.jpg') }}" width="90%" alt="">
        </div>
    </div>
</section>

<section class="mt-5">
   <div class="row">
    <div class="col-md-12">
        <h1 class="text-center heading mb-5">Multiple apps <br>
            One screen</h1>
    </div>
    <div class="col-md-10 offset-2">
        <img src="{{ asset('img/2.jpg') }}" width="80%" class="main-img" alt="">
    </div>
   </div>
</section>

@section('script')
{{--
<script>
    swal({
        title: "Success",
        text: "Thank you for shopping with us!",
        type: "success",
        confirmButtonText: "OK"
        });
</script> --}}
@endsection

@endsection


