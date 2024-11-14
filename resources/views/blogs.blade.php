@extends('layout')
@section('title', trans('admin.blogs'))
@section('content')
     <!-- Alt categories Section -->
     <img src="{{ url('assets') }}/home/img/21.png" class="shape" alt="Decorative Shape">

     <section class="recent-posts section mb-5 mt-md-4 mt-2">
        <img src="{{ url('assets') }}/home/img/lines.svg" class="patern" alt="Decorative Shape">
        <div class="container">
          <!-- Section Title -->
          <div class="section-title mb-3"  data-aos="fade-up" data-aos-delay="100">

            <h2>{{ trans('admin.Our Blogs') }}</h2>
            <p>{{ trans('admin.Blogs') }}</p>
            <span>
                {{ trans('admin.Emad Bakeries focuses on creating the highest standards in producing breads and pastries.') }}
            </span>
            {{-- <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="search">
                  <input
                    type="text"
                    placeholder="ُEnter blog title"
                    name="email"
                  />
                <button><i class="bi bi-search"></i></button>
                </div>
              </div>
             </div> --}}
            <div class="row justify-content-center">
              <div class="col-md-6">
                      <form action="{{ route('blogs') }}" method="GET">
                        <div class="search">
                          <input
                              type="text"
                              placeholder="{{ trans('admin.Enter blog title') }}"
                              name="query"
                              value="{{ request()->input('query') }}"
                              required
                          />
                          <button type="submit"><i class="bi bi-search"></i></button>
                      </form>
                  </div>
              </div>
          </div>
          
          </div>
         @if($blogs->isEmpty())
             <p>{{ trans('admin.No results found') }}</p>
         @endif
         
          <div class="row gy-5">
            @foreach ($blogs as $item)
        
            <div class="col-xl-4 col-md-6">
              <div
                class="post-item position-relative h-100"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <div class="post-img position-relative overflow-hidden">
                  <img
                    src="{{it()->url($item->photo)}}"
                    class="img-fluid"
                    alt=""
                    loading="lazy"
                  />
                  <span class="post-date">{{ \Carbon\Carbon::parse($item->created_at)->format('F j') }}</span>
                </div>

                <div class="post-content d-flex flex-column">
                  <h3 class="post-title">
                    {{$item['name_'. \L::l()]}}
                  </h3>

                  <p>
                    {!! \Illuminate\Support\Str::limit($item['description_' . \L::l()], 100, '...') !!}

                  </p>

                  <hr />

                  <a href="{{ url('blog-details/' . $item->id) }}" class="readmore stretched-link">
                    <span>{{ trans('admin.Read More') }}</span><i class="bi bi-arrow-right"></i>
                </a>
                
                </div>
              </div>
            </div>
            <!-- End post item -->
        
            @endforeach
          
          </div>

        </div>
      </section>
      <!-- /Alt Services Section -->
@endsection