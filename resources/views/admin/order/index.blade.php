@extends('admin.master')


@section('content')

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> New Orders
                            <a href="{{ url('/order-history') }}" class="btn btn-warning">Order History</a>
                            <a href="{{ url('/orders-pdf-download') }}" class="btn btn-primary btn-sm">Download PDF</a>
                        </h4>
                    </div>
                </div>
               <table class="table table-stripped table-bordered" id="order">
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ $item->tracking_no }}</td>
                            <td> ${{ $item->total_price }}</td>
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

@section('script')
<script>
    let table = new DataTable('#order');
</script>
@endsection

@endsection
