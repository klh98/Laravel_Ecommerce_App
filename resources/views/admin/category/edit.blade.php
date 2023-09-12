@extends('admin.master')


@section('content')

<div class="container">
    <h4 class="mb-4">Update Category Form</h4>
    <form action="{{ url('category', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div>
                <label for="">Category Name</label>
                <input type="text" name="name" class="form-control mb-3" value="{{ $category->name }}">
            </div>

            <div>
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control mb-3" value="{{ $category->slug }}">
            </div>

            <div>
                <label for="">Description</label>
                <textarea name="desc" class="form-control" id="" cols="30" rows="5">
                    {{ $category->description }}
                </textarea>
            </div>

            <div>
                <label for="">Status</label>
                <input type="checkbox" name="status" class="form-control mb-3" {{ $category->status == '1' ? 'checked' : ''}}>
            </div>

            <div>
                <label for="">Popular</label>
                <input type="checkbox" name="popular" class="form-control mb-3" {{ $category->popular == '1' ? 'checked' : ''}}>
            </div>

            <div>
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control mb-3" value="{{ $category->meta_title }}">
            </div>

            <div>
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control mb-3" value="{{  $category->meta_keywords }}">
            </div>

            <div>
                <label for="">Meta Description</label>
                <textarea name="meta_desc" class="form-control mb-3" id="" cols="30" rows="5">
                    {{ $category->meta_desc }}
                </textarea>
            </div>

            <div class="preview_img">
                @if($category->image)
                    <img src="{{ $category->profile_img_path() }}" alt="category" class="mb-3">
                @endif
            </div>

            <div class="mt-3">
                <label for="">New Image</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
</div>

@endsection
