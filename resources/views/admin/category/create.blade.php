@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
            <a href="{{ url('/category') }}" class="btn btn-primary btn-sm mb-4" style="float: right">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ url('/category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="desc" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_desc" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
