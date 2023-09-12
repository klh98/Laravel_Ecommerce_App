@extends('user.master')


@section('title')
    <h1>Products</h1>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <h2>{{ $category->name }}</h2>
        <div class="col-md-12">
            <div class="row">
                @foreach ($products as $pro)
                <div class="col-md-3 mb-3">
                    <div class="card">
                       <a href="{{ url('category/'.$category->slug.'/'.$pro->slug) }}">
                            <img src="{{ asset($pro->profile_img_path()) }}" alt="" width="200px" height="200px">
                            <div class="card-body">
                                <h5>{{ $pro->name }}</h5>
                                <p>{{ $pro->selling_price }}</p>
                                <p><s>{{ $pro->original_price }}</s></p>
                            </div>
                       </a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
