@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Order History
                            <a href="{{ url('/orders') }}" class="btn btn-warning">New Orders</a>
                        </h4>
                    </div>
                </div>
               <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ $item->tracking_no }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->status == 0 ? 'pending' : 'completed' }}</td>
                            <td>
                                <a href="{{ url('admin/view-orders/'.$item->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection
