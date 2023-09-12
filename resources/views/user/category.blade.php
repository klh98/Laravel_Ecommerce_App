@extends('user.master')
@extends('cdn')

@section('content')

<div class="row mt-4">
    <div class="col-md-4 offset-4">
        <form action="{{ url('/search_product') }}" method="POST" class="text-center">
            @csrf
            <div class="search-bar input-group">
              <input type="search" class="form-control" id="search_product" name="product_name" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
              <button type="submit" class="input-group-text" id="">Search</button>
            </div>
          </form>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 mb-3">
                    <a href="{{ url('view-category/' . $category->slug) }}">
                        <div class="">
                            <div class="card-img">
                                <img src="{{ asset($category->profile_img_path()) }}" width="200px" height="200px" alt="category_img">
                            </div>
                            <div class="">
                                {{ $category->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
    </div>
</div>

@section('script')
<script>
     var availableTags = [];
     $.ajax({
      method: "GET",
      url: "/product-list",
      success: function (response) {
        console.log(response);
        startAutoComplete(response);
      }
     });


     function startAutoComplete(availableTags)
     {
      $( "#search_product" ).autocomplete({
      source: availableTags
      });

    }

</script>
@endsection

@endsection
