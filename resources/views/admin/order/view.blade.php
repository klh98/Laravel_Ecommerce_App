@extends('admin.master')

@section('title')
    Welcome to Eshop
@endsection

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4>Shipping Details</h4>
           <label for="">First Name</label>
           <div class="border p-2">{{ $orders->fname }}</div>
           <label for="">Last Name</label>
           <div class="border p-2">{{ $orders->lname }}</div>
           <label for="">Email</label>
           <div class="border p-2">{{ $orders->email }}</div>
           <label for="">Contact No</label>
           <div class="border p-2">{{ $orders->phone }}</div>
           <label for="">Shipping Address</label>
           <div class="border p-2">
            {{ $orders->address1 }},
            {{ $orders->address2 }},
            {{ $orders->city }},
            {{ $orders->state }},
             {{ $orders->country }}
            </div>
            <label for="">Zip Code</label>
            <div class="border p-2">{{ $orders->pincode }}</div>
          </div>

          <div class="col-md-6">
            <h4>Order Details</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Qunatity</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->order_items as $item)
                        <tr>
                            <td>{{ $item->products->name}}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <img src="{{ asset('asset/uploads/product'.$item->products->image) }}" width="50px" height="50px" alt="">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Grand Total:{{ $orders->total_price }}</h4>

            <div class="mt-3">
                <label for="">Order Status</label>
                <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select class="form-control" name="order_status">
                        <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                        <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-5">Update</button>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection
