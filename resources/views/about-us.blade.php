@extends('layout')
@section('title', trans('admin.about_us'))

@section('content')
      <!-- Alt about-us Section -->
    <img src="{{ url('assets') }}/home/img/21.png" class="shape" alt="Decorative Shape">
      <section class="section about-us mt-md-4 mt-2">
        <div class="container">
          <!-- Section Title -->
          <div
            class="section-title mb-md-4 mb-1"
            data-aos="fade-up"
            data-aos-delay="100"
          >
          <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="100">
            <h2>{{ trans('admin.About') }}</h2>
            <p>{{ trans('admin.About Us') }}</p>
            <span>{{ trans('admin.Emad Bakeries is committed to providing the highest quality in baking, ensuring every product meets our exceptional standards.') }}</span>
        </div>
          </div>

          <div
            class="row justify-content-center gy-5"
            data-aos="fade-up"
            data-aos-delay="150"
          >
            <div class="col-12"></div>
          </div>
        </div>

        <div class="about-cards">
        @foreach ($abouts as $item)
            
          <div class="container mb-5" data-aos="fade-up">
            <div class="row g-5">
              <div
                class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center {{ $item->id % 2 === 0 ? 'order-md-first' : 'order-md-last' }}"
              >
                <h3><em>{{$item['title_'.\L::l()]}}</em></h3>
                <p>
                  {!! $item['description_'.\L::l()] !!}
                </p>
                <!-- <a class="cta-btn align-self-start" href="#">Call To Action</a> -->
              </div>
  
              <div
                class="col-lg-4 col-md-6 {{ $item->id % 2 === 0 ? 'order-last' : 'order-first' }} {{ $item->id % 2 === 0 ? 'order-md-last' : 'order-md-first' }} d-flex align-items-center"
              >
                <div class="img">
                  <img
                    src="{{it()->url($item->photo)}}"
                    alt=""
                    class="img-fluid"
                  />
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      
      </section>
      <!-- /about-us Section -->
@endsection