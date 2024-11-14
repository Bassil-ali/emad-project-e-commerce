@extends('layout')
@section('title', trans('admin.products'))

@section('content')
    
<div
class="page-title"
style="
    background-image: linear-gradient(
        to {{ \L::l() == 'ar' ? 'left' : 'right' }},
        #036733f1,
        rgba(0, 0, 0, 0)
      ),
      url({{ url('assets') }}/home/img/stats.jpg);
"
>
<div
  class="container d-lg-flex justify-content-between align-items-center"
>
<div class="content">
    <h1 class="mb-2">{{ $category['name_'.\L::l() ]}}</h1>
    <p>
        {!! \Str::limit($category['description_' . \L::l()], 100) !!}
    </p>
    <nav class="breadcrumbs">
        <ol>
            <li><a href="{{ route('home') }}">{{trans('admin.Home')}}</a></li>
            <li class="current">
                <a href="{{ route('categories') }}">{{trans('admin.Back to Categories')}}</a>
            </li>
        </ol>
    </nav>
</div>

</div>
</div>
<!-- End Page Title -->

<section>
<div class="container">
    <div class="row align-items-center justify-content-between mb-4">
        <div class="col-md-4">
            <form action="{{ route('products-search-byname', ['category_id' => $category->id]) }}" method="GET">
                <div class="search">
                    <input
                        type="text"
                        placeholder="{{ trans('admin.enter_product_title') }}"
                        name="query"
                        required
                    />
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('products-search-bycategory', ['category_id' => $category->id]) }}" method="GET" id="searchForm">
                <select name="category_id" class="nice-select" id="categorySelect">
                    <option value="" data-display="{{ trans('admin.select_category') }}">{{ trans('admin.select_category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category['name_' . \L::l()] }}</option>
                    @endforeach
                </select>
            </form>
            
            <!-- Initialize Nice Select and Enable Auto-Submit -->
            <script>
                $(document).ready(function() {
                    // Initialize Nice Select
                    $('select').niceSelect();
            
                    // Auto-submit form on category selection change
                    $('#categorySelect').on('change', function() {
                        $('#searchForm').submit();
                    });
                });
            </script>
            
        </div>
    </div>
    
    </div>
    
<div class="container">
      <div class="row gy-4">
    <div class="row gy-4">
        @foreach($products as $product)
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('product-details', $product->id) }}" class="product-card text-center p-3">
                <div class="img position-relative mb-2">
                    <img src="{{ it()->url($product->main_photo) }}" class="img-fluid" alt="{{ $product['name_'.\L::l() ]}}" loading="lazy" />
                </div>
                <h4>{{ $product['name_'.\L::l() ]}}</h4>
                <p>{!! \Str::limit($product['description_' . \L::l()], 150) !!}</p>
                <span class="primary-btn">
                    {{trans('admin.View Details')}}
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.67027 14L3 12.3308L10.0515 5.27683H4.75413L4.7681 3H14V12.233H11.7078L11.7217 6.94603L4.67027 14Z" fill="white" />
                    </svg>
                </span>
            </a>
        </div>
        @endforeach
        @if($products->isEmpty())
        <p>{{ trans('admin.No results found') }}</p>
        @endif
    </div>
    

   
  </div>

</div>
</div>
</section>
@endsection

