@extends('user.master')

@section('title')
    <h3 style="margin-left: 50px">My Cart</h3>
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('/place-order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control firstname" placeholder="Enter First Name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">Last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control lastname" placeholder="Enter Last Name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control email" placeholder="Enter Email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">Phone Number</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control phone" placeholder="Enter Phone Number">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">Address 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control address1" placeholder="Enter Address 1">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="firstName">Address 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control address2" placeholder="Enter Address 2">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">City</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control city" placeholder="Enter City">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">State</label>
                                    <input type="text" name="state" value="{{ Auth::user()->state }}" class="form-control state" placeholder="Enter State">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">Country</label>
                                    <input type="text" name="country" value="{{ Auth::user()->country }}" class="form-control country" placeholder="Enter Country">
                                    <span id="country_error" class=" text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName">Pin Code</label>
                                    <input type="text" name="pin_code" value="{{ Auth::user()->pincode }}" class="form-control pincode" placeholder="Enter Pin Code">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_items as $item )
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-success btn-sm w-100 mb-3">Place Order | COD </button>
                        </div>
                    </div>
                </div>
            </div>
         </form>
         {{-- <form action="/session" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-success btn-sm w-100 mb-3" type="submit" id="checkout-live-button">Checkout with Epayment</button>
        </form>
        <a href="{{ url('/categories') }}" class="btn btn-info btn-sm w-100 mb-3">Contine Shopping</a> --}}
    </div>
@endsection
