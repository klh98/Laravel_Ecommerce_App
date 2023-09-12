@extends('admin.master')


@section('content')

{{-- <h2>Show Doctor</h2> --}}

@if(Session::has('message'))
{{-- <p class="alert alert-info">{{ Session::get('message') }}</p> --}}
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="container">
<h2>Product List</h2>
<a href="{{ url('/product/create') }}" class="btn btn-primary btn-sm mb-4" style="float: right">Add New</a>


<table class="table table-hover mt-5" id="product">
    <thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Image</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ Str::limit($product->description, 50)}}</td>
            <td><img src="{{ asset('storage/app/public/img/' . $product->image) }}" alt="doctor_image" width="100px" height="100px"></td>
            <td class="d-flex">
                <a href="{{ url('product/' . $product->id ) }}" class="btn btn-info mr-2">View</a>
                <a href="{{ url('product/' . $product->id . '/edit', ) }}" class="btn btn-success mr-2">Edit</a>
                <a href="{{ url('delete_product', $product->id) }}" onclick="return confirm('Are you sure to delete this?')"
                    class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@section('script')
<script>
    let table = new DataTable('#product');
</script>
@endsection

@endsection
