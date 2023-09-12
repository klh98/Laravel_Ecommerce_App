@extends('user.master')

@section('content')

    <div class="bg-primary" style="color:white; padding:10px">
        <div class="container">
            <h6>Collection/{{ $products->category->name }}/ {{$products->name}}</h6>
        </div>
    </div>

        <div class="conatiner">
          <div class="card">
            <div class="card-body">
                <div class="row product_data">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset($products->profile_img_path()) }}" alt="" width="350px" height="350px">
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $products->name }}
                            @if ($products->trending == '1')
                               <label for="" style="font-size: 16px;" class="float-end trending_tag">Trending </label>
                            @endif
                        </h2>
                        <hr>

                        <label for="" class="me-3">Original Price : <s>$ {{ $products->original_price }}</s></label>
                        <label for="" class="me-3">Selling Price : $ {{ $products->selling_price }} </label>
                        <p class="mt-3">
                            {{ $products->small_description }}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label for="" class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$products->id}}" class="prod_id">
                                <label for="Qunatity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($products->qty > 0)
                                <button type="button" class="btn btn-success me-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                            </div>

                            <div class="col-md-12">
                                <hr>
                                <h3>Description</h3>
                                <p>
                                    {{ $products->description }}
                                </p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

@endsection


