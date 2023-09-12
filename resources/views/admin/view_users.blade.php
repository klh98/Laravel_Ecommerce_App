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
<h2>Registered User List</h2>

<table class="table table-hover mt-5">
    <tr>
        <th>No</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th class="">Address</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->phone}}</td>
            <td>{{ $user->address1}}</td>
        </tr>
    @endforeach
</table>

</div>
@endsection
