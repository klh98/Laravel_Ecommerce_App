@extends('admin.master')


@section('content')

<div class="container">
    <h4 class="mb-4">Details Informations of {{ $product->name }}</h4>
    <form action="{{ url('product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div>
               <p> Name : {{ $product->name }}</p>
            </div>

            <div>
                <p> Slug : {{ $product->slug }}</p>
            </div>

            <div>
               <p> Description : {{ $product->description }}</p>
            </div>

            <div>
                <p> Original Price : {{ $product->original_price }}</p>
            </div>

            <div>
                <p> Selling Price : {{ $product->selling_price }}</p>
            </div>

            <div>
                <p> Qty : {{ $product->qty }}</p>
            </div>

            <div>
                <p> Tax : {{ $product->tax }}</p>
            </div>

            <div>
                <p>{{ $product->status == 1 ? 'status : true' : '' }}</p>
            </div>

            <div>
                <p>{{ $product->trending == 1 ? 'trending : true' : '' }}</p>
            </div>

            <div>
                <p> Meta_Title : {{ $product->meta_title }}</p>
            </div>

            <div>
                <p> Meta_Keywords : {{ $product->meta_keywords }}</p>
            </div>

            <div>
                <p> Meta_Desc : {{ $product->meta_desc }}</p>
            </div>

            <div class="preview_img">
                @if($product->image)
                    <img src="{{ $product->profile_img_path() }}" alt="category" class="mb-3">
                @endif
            </div>

          <a href="{{ url('/product') }}" class="btn btn-primary btn-sm">Back</a>
        </form>
</div>

@endsection
