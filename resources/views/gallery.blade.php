@extends('layout')
@section('title', trans('admin.gallery'))
@section('content')
          <!-- Alt categories Section -->
               <img src="{{ url('assets') }}/home/img/21.png" class="shape" alt="Decorative Shape">
          <section class="section mt-md-4 mt-2 pb-2">
            <img src="{{ url('assets') }}/home/img/lines.svg" class="patern" alt="Decorative Shape">
             
            <div class="container">
              <!-- Section Title -->
              <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="100">
                <h2>{{ trans('admin.Our Gallery') }}</h2>
                <p>{{ trans('admin.Gallery') }}</p>
                <span>
                    {{ trans('admin.Emad Bakeries focuses on creating the highest standards in producing breads and pastries has been the simply') }}
                </span>
            </div>
            
             
            
    
            </div>
          </section>
          <!-- /Alt Services Section -->
    
    
    
         <!-- Portfolio Section -->
         <section id="portfolio" class="portfolio section pt-0">
    
          <div class="container">
    
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
    
              <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">{{ trans('admin.All') }}</li>
                <li data-filter=".filter-1">{{ trans('admin.Compony') }}</li>
                <li data-filter=".filter-2">{{ trans('admin.Branches') }}</li>
                <li data-filter=".filter-3">{{ trans('admin.Factories') }}</li>
              </ul><!-- End Portfolio Filters -->
    
              <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
    
                @foreach ($gallery as $item)
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{$item->category}}">
                  <div class="portfolio-content h-100">
                    <img src="{{it()->url($item->photo)}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4>
                        @if ($item->category == 1)
                            {{ trans('admin.Compony') }}
                        @elseif ($item->category == 2)
                            {{ trans('admin.Branches') }}
                        @elseif ($item->category == 3)
                            {{ trans('admin.Factories') }}
                        @else
                            {{ trans('admin.Unknown Category') }} <!-- Fallback if the category does not match -->
                        @endif
                    </h4>
                      <p>{{$item->Address}}</p>
                      <a href="{{ it()->url($item->photo) }}" 
                        title="@if ($item->category == 1) {{ trans('admin.Compony') }}
                               @elseif ($item->category == 2) {{ trans('admin.Branches') }}
                               @elseif ($item->category == 3) {{ trans('admin.Factories') }}
                               @else {{ trans('admin.Unknown Category') }}
                               @endif" 
                        data-gallery="portfolio-gallery-app" 
                        class="glightbox preview-link">
                         <i class="bi bi-zoom-in"></i>
                     </a>
                     
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->
    
                @endforeach
               
              
    
              </div><!-- End Portfolio Container -->
    
            </div>
    
          </div>
    
        </section><!-- /Portfolio Section -->
    
    
@endsection