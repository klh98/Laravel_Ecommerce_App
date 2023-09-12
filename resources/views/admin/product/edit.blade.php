@extends('admin.master')


@section('content')

<div class="container">
    <h4 class="mb-4">Update Product Form</h4>
    <form action="{{ url('product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div>
                <label for="">Product Name</label>
                <input type="text" name="name" class="form-control mb-3" value="{{ $product->name }}">
            </div>

            <div>
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control mb-3" value="{{ $product->slug }}">
            </div>

            <div>
                <label for="">Category</label>
                <select name="category_id" id="" class="form-control mb-3">
                    <option value="">--- Select Category ---</option>
                    @foreach ($categories  as $category)
                        <option value="{{ $category->id }}" @if ($product->category_id == $category->id)
                            selected
                        @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="">Description</label>
                <textarea name="desc" class="form-control" id="" cols="30" rows="5">
                    {{ $product->description }}
                </textarea>
            </div>

            <div>
                <label for="">Original Price</label>
                <input type="text" name="original_price" class="form-control mb-3" value="{{ $product->original_price }}">
            </div>

            <div>
                <label for="">Selling Price</label>
                <input type="text" name="selling_price" class="form-control mb-3" value="{{ $product->selling_price }}">
            </div>

            <div>
                <label for="">Qty</label>
                <input type="text" name="qty" class="form-control mb-3" value="{{ $product->qty }}">
            </div>

            <div>
                <label for="">Tax</label>
                <input type="text" name="tax" class="form-control mb-3" value="{{ $product->tax }}">
            </div>

            <div>
                <label for="">Status</label>
                <input type="checkbox" name="status" class="form-control mb-3" {{ $product->status == '1' ? 'checked' : ''}}>
            </div>

            <div>
                <label for="">Trending</label>
                <input type="checkbox" name="popular" class="form-control mb-3" {{ $product->trending == '1' ? 'checked' : ''}}>
            </div>

            <div>
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control mb-3" value="{{ $product->meta_title }}">
            </div>

            <div>
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control mb-3" value="{{  $product->meta_keywords }}">
            </div>

            <div>
                <label for="">Meta Description</label>
                <textarea name="meta_desc" class="form-control mb-3" id="" cols="30" rows="5">
                    {{ $product->meta_desc }}
                </textarea>
            </div>

            <div class="preview_img">
                @if($product->image)
                    <img src="{{ $product->profile_img_path() }}" alt="product" class="mb-3">
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
