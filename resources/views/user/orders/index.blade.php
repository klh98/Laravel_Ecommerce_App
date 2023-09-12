@extends('user.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
               <table class="table table-stripped table-bordered" id="my_order">
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
                                <a href="{{ url('view-orders/'.$item->id) }}" class="btn btn-primary">View</a>
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
    let table = new DataTable('#my_order');
</script>
@endsection

@endsection
