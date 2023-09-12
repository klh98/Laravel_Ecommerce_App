@extends('admin.master')


@section('content')

<div class="container">
    <h4 class="mb-4">Details Informations of {{ $category->name }}</h4>
    <form action="{{ url('category', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div>
               <p> Name : {{ $category->name }}</p>
            </div>

            <div>
                <p> Slug : {{ $category->slug }}</p>
            </div>

            <div>
               <p> Description : {{ $category->description }}</p>
            </div>

            <div>
                <p>{{ $category->status == 1 ? 'status : true' : '' }}</p>
            </div>

            <div>
                <p>{{ $category->popular == 1 ? 'popular : true' : '' }}</p>
            </div>

            <div>
                <p> Meta_Title : {{ $category->meta_title }}</p>
            </div>

            <div>
                <p> Meta_Keywords : {{ $category->meta_keywords }}</p>
            </div>

            <div>
                <p> Meta_Desc : {{ $category->meta_desc }}</p>
            </div>

            <div class="preview_img">
                @if($category->image)
                    <img src="{{ $category->profile_img_path() }}" alt="category" class="mb-3">
                @endif
            </div>

          <a href="{{ url('/category') }}" class="btn btn-primary btn-sm">Back</a>
        </form>
</div>

@endsection
