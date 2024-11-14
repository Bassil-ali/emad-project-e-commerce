@extends('layout')
@section('title', trans('admin.product_details'))
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
    <div class="content">
      <h1 class="mb-2">{{ $product->category['name_'.\L::l()] }}</h1>
      <p>{!! \Str::limit($product->category['description_' . \L::l()], 150) !!}</p>
      
    
  </div>
  
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ route('home') }}">{{ trans('admin.home') }}</a></li>
        <li class="current">
            <a href="{{ route('products', ['id' =>$product->category->id]) }}">
                {{ trans('admin.back_to_products') }}
            </a>
        </li>
      </ol>
    </nav>
  </div>
</div>
</div>
<!-- End Page Title -->
<section class="product-details">
  <div class="container">
    <div class="row">
        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
            <div
                style="
                    --swiper-navigation-color: #fff;
                    --swiper-pagination-color: #fff;
                "
                class="swiper productDetails2"
            >
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="{{it()->url($product->main_photo)}}" />
                </div>
                @foreach(json_decode($product->photos) as $photo)
                    <div class="swiper-slide">
                        <img src="{{it()->url( $photo)}}" />
                    </div>
                @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper productDetails1">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="{{it()->url($product->main_photo)}}" />
                  </div>
                    @foreach(json_decode($product->photos) as $photo)
                        <div class="swiper-slide">
                            <img src="{{it()->url( $photo)}}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="150">
            <div class="product-content">
                <h3>{{ $product['name_'.\L::l()] }}</h3>
                <span>{{ $product['title_'.\L::l()]  }}</span>
                <div class="d-flex pt-3">
                    <sup>R</sup>
                    <p>{{ $product->price }}</p>
                </div>

                <a class="primary-btn me-2" href="#form">
                    <img src="{{ url('assets') }}/home/img/icons/cart.svg" class="pe-1" alt="" />
                    {{ trans('admin.send_order') }}</a
                >
                <a class="secondary-btn" href="tel:+966920010183">
                  <img
                      src="{{ url('assets') }}/home/img/icons/call-primary.svg"
                      class="pe-1"
                      alt="Call us"
                  />
              
              
                    {{ trans('admin.call_now') }}
                </a>
                <div class="table-responsive">
                    <table class="table custom-table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">{{ trans('admin.packing') }}</th>
                                <th scope="col">{{ trans('admin.size') }}</th>
                                <th scope="col">{{ trans('admin.barcode') }}</th>
                                <th scope="col">{{ trans('admin.calories_per_serving') }}</th>
                                <th scope="col">{{ trans('admin.allergens') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->ingredients as $ingredient)
                            <tr>
                                <td>{{ $ingredient['Packing_'.\L::l()] }}</td>
                                <td>{{ $ingredient->Size }}</td>
                                <td>{{ $ingredient->Barcode }}</td>
                                <td>{{ $ingredient['Calories_per_serving_'.\L::l()] }}</td>
                                <td>{{ $ingredient['Allergens_'.\L::l()] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

  

<div class="container mt-5" id="form">
  <h3 data-aos="fade-up" data-aos-delay="100">{{ trans('admin.send_order') }}</h3>
  <form
    action="{{ route('orders') }}"  
    method="post"
    class="partner-form pt-4"
    data-aos="fade-up"
    data-aos-delay="150"
  >
    @csrf  <!-- Include CSRF token for security -->
    <div class="row gy-4">
      <div class="col-md-4">
        <label for="full_name">{{ trans('admin.full_name') }} *</label>
        <input
          type="text"
          name="full_name"  
          class="form-control"
          placeholder="{{ trans('admin.enter_full_name') }}"
          required
        />
      </div>
      <div class="col-md-4">
        <label for="email">{{ trans('admin.email') }} *</label>
        <input
          type="email"  
          name="contact_email"  
          class="form-control"
          placeholder="{{ trans('admin.enter_email') }}"
          required
        />
      </div>
      <div class="col-md-4">
        <label for="mobile">{{ trans('admin.mobile') }} *</label>
        <input
          type="tel"  
          name="mobile"  
          class="form-control"
          placeholder="{{ trans('admin.enter_mobile') }}"
          required
        />
      </div>
      <div class="col-md-12">
        <label for="message">{{ trans('admin.message') }}</label>
        <textarea
          class="form-control"
          name="message"
          rows="5"
          placeholder="{{ trans('admin.enter_message') }}"
          required
        ></textarea>
      </div>

      <!-- Hidden Inputs for Product URLs -->
      <input type="hidden" name="product_url" value="{{ url('product-details/'.$product->id)}}" />
     
      <!-- Add more hidden inputs as needed -->

      <div class="col-md-12 text-center d-flex gap-4 align-items-center submit-sec">
        <button type="submit">{{ trans('admin.send_message') }}</button>
        <a href="javascript:void(0)" onclick="document.querySelector('.partner-form').reset();">{{ trans('admin.reset') }}</a>
      </div>
    </div>
  </form>
</div>

</section>

<section class="border-top">
  <div class="container">
      <div class="container section-title text-start" data-aos="fade-up">
          <p>{{ trans('admin.related_products') }}</p>
      </div>
      <div class="row gy-4">
          @foreach($randomProducts as $product)
              <div class="col-md-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                  <a href="{{route('product-details',$product->id)}}" class="product-card text-center p-3">
                      <div class="img position-relative mb-2">
                          <img
                              src="{{it()->url($product->main_photo)}}"
                              class="img-fluid"
                              alt="{{ trans('admin.product_image') }}"
                              loading="lazy"
                          />
                      </div>
                      <h4>{{ $product['name_'.\L::l()] }}</h4>
                      <p>{!! \Str::limit($product['description_' . \L::l()], 100) !!}</p>
                      <span class="primary-btn">
                          {{ trans('admin.view_details') }}
                          <svg
                              width="17"
                              height="17"
                              viewBox="0 0 17 17"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                          >
                              <path
                                  d="M4.67027 14L3 12.3308L10.0515 5.27683H4.75413L4.7681 3H14V12.233H11.7078L11.7217 6.94603L4.67027 14Z"
                                  fill="white"
                              />
                          </svg>
                      </span>
                  </a>
              </div>
          @endforeach
      </div>
  </div>
</section>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@endsection