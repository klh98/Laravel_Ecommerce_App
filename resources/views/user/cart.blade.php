@extends('user.master')

@section('content')
    <div class="container my-5">
        <div class="card shadow">
           @if ($cart_items->count()>0)
           <div class="card-body">
            @php
                $total=0;
            @endphp
            @foreach ($cart_items as $item )
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('asset/uploads/product/' .$item->products->image) }}" width="80px" height="80px" alt="Image here">
                </div>
                <div class="col-md-3">
                    <h5>{{ $item->products->name }}</h5>
                </div>
                <div class="col-md-2">
                    <h5>{{ $item->products->selling_price }}</h5>
                </div>
                <div class="col-md-3">
                    <input type="hidden" name="" class="prod_id" value="{{ $item->prod_id }}">
                    @if ($item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Quatity</label>
                    <div class="input-group text-center mb-3" style="width:120px">
                        <button class="input-group-text changeQunatity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                        <button class="input-group-text changeQunatity increment-btn">+</button>
                    </div>

                    @else
                    <h6>Out of Stock</h6>
                    @endif

                </div>
                <div class="col-md-2">
                   <button class="btn btn-danger delete-cart-item"><i class="fas fa-trash"></i> Remove</button>
                </div>
            </div>
            @php
                $total += $item->products->selling_price * $item->prod_qty;
            @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price: {{ $total }}</h6>
            <a href="{{ url('/checkout') }}" class="btn btn-outline-success" style="float: right;">Procced to Checkout</a>
        </div>
        @else
            <div class="card-body text-center py-5">
                <h2>Your Cart is empyt</h2>
                <a href="{{ url('/categories') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
        @endif
        </div>
    </div>
@endsection
