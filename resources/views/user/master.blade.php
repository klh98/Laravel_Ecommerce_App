<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Technoland</title>

    @include('cdn')

    {{-- google fonts  --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- custom css  --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    {{-- sweet alert --}}
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    {{-- jquery datatable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- jqeury auto complete --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>
<body>

    @include('user.navbar')

   <div class="content">
        @yield('content')
   </div>

<footer class="bg-primary footer p-5 mt-5">
    <div class="row">
        <div class="col-md-6 col-sm-12 d-flex">
            <div class="">
                <img src="{{ asset('img/footer.png') }}" alt="" width="50%">
            </div>
            <div class="col-md-6 col-sm-12">
                <h4>No.162 – 170, 36th Street (middle block),</h4>
                <h4>Kyauktada Township, Yangon.</h4>
                <h4>09-970035101~04</h4>
                <h4>info@technoland.com.mm</h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-3 col-sm-6">
                    <img src="{{asset('img/90.png')}}" width="100px" alt="">
                   <h5 style="color: white">Delivery</h5>
                </div>
                <div class="col-3 col-sm-6">
                    <img src="{{asset('img/91.png')}}" width="60px" alt="">
                    <h5 style="color: white">Secure Payment</h5>
                </div>
                <div class="col-3 col-sm-6">
                    <img src="{{asset('img/92.png')}}" width="100px" alt="">
                    <h5 style="color: white">Cash on Delivery</h5>
                </div>
                <div class="col-3 col-sm-6">
                    <img src="{{asset('img/93.png')}}" width="100px" alt="">
                    <h5 style="color: white">24/7 Customer Support</h5>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- custom js  --}}
<script src="{{ asset('js/custom.js') }}"></script>

{{-- jquery datatable  --}}
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

{{-- jquery auto complete  --}}
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

@yield('script')

</body>
</html>
