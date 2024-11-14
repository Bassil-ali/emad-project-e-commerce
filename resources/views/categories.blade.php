@extends('layout')
@section('title', trans('admin.categories'))
@section('content')
       <!-- Alt categories Section -->
            <img src="{{ url('assets') }}/home/img/21.png" class="shape" alt="Decorative Shape">
       <section class="categories section mb-5 mt-md-4 mt-2">
        <img src="{{ url('assets') }}/home/img/lines.svg" class="patern" alt="Decorative Shape">
        <div class="container">
          <!-- Section Title -->
          <div class="section-title mb-3"  data-aos="fade-up" data-aos-delay="100">
            <h2>{{ trans('admin.Our Categories') }}</h2>
            <p>{{ trans('admin.Categories') }}</p>
            <span>
                {{ trans('admin.Emad Bakeries is committed to maintaining the highest standards in producing breads and pastries, setting a benchmark in the industry.') }}
            </span>
          </div>
          <!-- End Section Title -->
          <div class="row gy-4">
            @foreach ($categories as $category)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="service-item position-relative">
                        <div class="img">
                            <img src="{{it()->url($category->photo)}}" loading="lazy" class="img-fluid" alt="{{ $category['name_'.\L::l() ]}}" />
                        </div>
                        <div class="details">
                            <a href="{{ route('products', $category->id) }}" class="stretched-link">
                                <h3>{{ $category['name_'.\L::l() ]}}</h3>
                            </a>
                            <p>{!! \Str::limit($category['description_' . \L::l()], 150) !!}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
            <!-- End Service Item -->

          </div>
        </div>
      </section>
      <!-- /Alt Services Section -->
@endsection