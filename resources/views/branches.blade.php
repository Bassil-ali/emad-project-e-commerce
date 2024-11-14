@extends('layout')
@section('title', trans('admin.branches'))
@section('content')
<style type="text/css">
.d-none {
    display: none !important;
}
</style>
     <!-- Alt categories Section -->
          <img src="{{ url('assets') }}/home/img/21.png" class="shape" alt="Decorative Shape">

     <section class="section pb-5">
        <div class="container">
          <!-- Section Title -->
          <div
            class="section-title mt-md-4 mt-2 pb-2"
            data-aos="fade-up"
            data-aos-delay="100"
          >
          <h2>{{ trans('admin.Branches') }}</h2>
          <p>{{ trans('admin.Our Branches') }}</p>
          <span>
              {{ trans('admin.Emad Bakeries focuses on creating the highest standards in producing breads and pastries has been the simply') }}
          </span>
          
          </div>
        </div>
      </section>
      <!-- /Alt Services Section -->

      <!-- Galary Section -->
      <section class="portfolio section pt-0">
        <div class="container">
            <div class="isotope-layout" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    @foreach ($branches as $index => $item)
                        <li data-filter=".filter-{{ $item['name_' . \L::l()] }}" 
                            class="filter-item {{ $index === 0 ? 'filter-active' : '' }}">
                            {{ $item['name_' . \L::l()] }}
                        </li>
                    @endforeach
                </ul>
    
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($branches as $index => $item)
                        <div class="col-12 portfolio-item isotope-item filter-content filter-{{ $item['name_' . \L::l()] }} {{ $index === 0 ? 'active' : 'd-none' }}">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="iframe">
                                        <iframe src="{{ $item->url_location }}" width="100%" style="border: 0"
                                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="branch-cart p-4">
                                        <img src="{{ url('assets') }}/home/img/icons/location.svg" alt="" />
                                        <p>{{ trans('admin.address') }}</p>
                                        <span>{{ $item['address_' . \L::l()] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="branch-cart p-4">
                                        <img src="{{ url('assets') }}/home/img/icons/call.svg" alt="" />
                                        <p>{{ trans('admin.Call Us') }}</p>
                                        <a href="call:{{ $item->call_us }}" class="px-5">{{ $item->call_us }}</a>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="branch-cart p-4">
                                        <img src="{{ url('assets') }}/home/img/icons/clock.svg" alt="" />
                                        <p>{{ trans('admin.Open Hours') }}</p>
                                        <div class="d-flex flex-wrap justify-content-center gap-3">
                                            <div class="d-flex flex-column text-start">
                                                <span>{{ $item->open_hours }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <
    <script>
      document.querySelectorAll('.filter-item').forEach(item => {
    item.addEventListener('click', function() {
        // Remove active class from all items
        document.querySelectorAll('.filter-item').forEach(el => el.classList.remove('filter-active'));
        
        // Add active class to the clicked item
        this.classList.add('filter-active');

        // Get the filter value
        const filterValue = this.getAttribute('data-filter');

        // Show/hide items based on the filter
        document.querySelectorAll('.portfolio-item').forEach(portfolioItem => {
            if (portfolioItem.classList.contains(filterValue.substring(1))) {
                portfolioItem.classList.remove('d-none');
            } else {
                portfolioItem.classList.add('d-none');
            }
        });
    });
});

    </script>
    
      <!-- /Portfolio Section -->
@endsection