@extends('layout')
@section('title', trans('admin.home'))
@section('content')
   <!-- Hero Section -->
   <section class="creative-fullpage--slider pt-0" id="hero">
    <div class="banner-horizental">
      <div class="swiper swiper-container-h">
     
          <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide">
                    <div class="slider-inner" data-swiper-parallax="100">
                        <div class="img">
                            <img src="{{it()->url($banner->photo)}}" alt="full_screen-image" />
                        </div>
                        <div class="swiper-content" data-swiper-parallax="2000">
                            <div class="title-area">
                                <a href="{{ $banner->action_url }}" class="title">
                                    {{ \L::l() === 'ar' ? $banner->title_ar : $banner->title_en }}
                                </a>
                            </div>
                            <p class="disc">
                              {!! $banner['description_' . \L::l()] !!}
                            </p>
                            <div class="creative-btn--wrap">
                                <a class="creative-slide--btn" role="button" href="{{ $banner->product_url }}">
                                    <div class="creative-btn--circle">
                                        <div class="circle">
                                            <div class="circle-fill"></div>
                                            <svg viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" class="circle-outline">
                                                <circle cx="25" cy="25" r="23"></circle>
                                            </svg>
                                            <div class="circle-icon">
                                                <svg viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-arrow">
                                                    <path d="M0 5.65612V4.30388L8.41874 4.31842L5.05997 0.95965L5.99054 0L10.9923 4.97273L6.00508 9.96L5.07451 9.00035L8.43328 5.64158L0 5.65612Z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="creative-btn--label">
                                        <div class="creative-btn__text">{{trans('admin.See More')}}</div>
                                        <div class="creative-btn__border"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="swiper-button-wrapper creative-button--wrapper">
          <i
            class="bi bi-chevron-right swiper-button-next"
            tabindex="0"
            role="button"
            aria-label="Next slide"
          ></i>
          <i
            class="bi bi-chevron-left swiper-button-prev"
            tabindex="0"
            role="button"
            aria-label="Previous slide"
          ></i>
        </div>
      <!--   <div class="slider-pagination-area">
          <h5 class="slide-range one">01</h5>
          <div
            class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal"
          >
            <span
              class="swiper-pagination-progressbar-fill"
              style="
                transform: translate3d(0px, 0px, 0px) scaleX(0.666667)
                  scaleY(1);
                transition-duration: 1500ms;
              "
            ></span>
          </div>
          <h5 class="slide-range three">02</h5>
        </div> -->
      </div>
    </div>
  </section>
  <!-- End clients Section -->

  <!-- Clients Section -->
  <section id="clients" class="clients section text-center">
    <div class="container" data-aos="fade-up">
      <h2>{{ trans('admin.trusted_by') }}</h2>

        <div class="swiper init-swiper mt-4">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 3000,
                    "allowTouchMove": false,
                    "autoplay": {
                        "delay": 0.1
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                @foreach($distributors as $distributor)
                    <div class="swiper-slide">
                        <img src="{{it()->url($distributor->photo)}}" class="img-fluid" alt="Distributor Logo" />
                    </div>
                @endforeach
            </div>
            {{-- <!-- Optional: Add pagination if needed -->
            <div class="swiper-pagination"></div> --}}
        </div>
    </div>
</section>

  <!-- / End clients Section -->

  <!-- serve Section -->
  <section id="serve" class="serve section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ trans('admin.what_we_serve') }}</h2>
        <p>{{ trans('admin.served_industries') }}</p>
    </div>
    <!-- End Section Title -->
    <div class="container">
        <div class="row gy-4">
            @foreach($servedIndustries as $industry)
                <div class="col-md-2 col-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                    <div class="serve-item position-relative">
                        <div class="img">
                            <img
                                src="{{ it()->url($industry->photo) }}" 
                                loading="lazy"
                                class="img-fluid"
                                alt="{{ $industry->{'title_' . app()->getLocale()} }}"
                            />
                        </div>
                        <div class="details">
                            <a href="#" class="stretched-link">
                                <h3>{{ $industry->{'title_' . app()->getLocale()} }}</h3> 
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End serve-item Item -->
        </div>
    </div>
</section>

  <!-- / End Services Section -->

  <!-- Video Section -->
  <section class="intro-video-area section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="inner-content-head" data-aos="fade-up">
            <div class="inner-content">
              <div class="custom-video-wrapper">
                <iframe
                  class="embed-responsive-item"
                  src="https://www.youtube.com/embed/dqAqetWcpJo?si=PLuWbTiuo_zekynx"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Video Section -->

  <!-- products Section -->
  <section class="products-sec section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>{{ trans('admin.new_products') }}</h2>
      <p>{{ trans('admin.whats_new') }}</p>
    </div>
    <!-- End Section Title -->
    <div class="container">
      <div class="row gy-4">
          @foreach($latestProducts as $product)
          <div class="col-md-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 + 100 }}">
              <a href="{{ route('product-details', $product->id) }}" class="product-card text-center p-3">
                  <div class="img position-relative mb-2">
                      <img
                          src="{{ it()->url($product->main_photo) }}"
                          class="img-fluid"
                          alt="{{ $product->title_en }}"  
                          loading="lazy"
                      />
                  </div>
                  <h4>{{ $product['name_'.\L::l() ]}}</h4>
                <p>{!! \Str::limit($product['description_' . \L::l()], 150) !!}</p>
                  <span class="primary-btn">
                      {{trans('admin.View Details')}}
                      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M4.67027 14L3 12.3308L10.0515 5.27683H4.75413L4.7681 3H14V12.233H11.7078L11.7217 6.94603L4.67027 14Z" fill="white"/>
                      </svg>
                  </span>
              </a>
          </div>
          @endforeach
      </div>
      <div class="view-more text-center mt-5" data-aos="fade-up">
          <a href="{{route('categories')}}">{{trans('admin.View More')}}
              <svg width="30" height="12" viewBox="0 0 30 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M29.5303 6.53033C29.8232 6.23744 29.8232 5.76256 29.5303 5.46967L24.7574 0.696699C24.4645 0.403806 23.9896 0.403806 23.6967 0.696699C23.4038 0.989593 23.4038 1.46447 23.6967 1.75736L27.9393 6L23.6967 10.2426C23.4038 10.5355 23.4038 11.0104 23.6967 11.3033C23.9896 11.5962 24.4645 11.5962 24.7574 11.3033L29.5303 6.53033ZM0 6.75H29V5.25H0V6.75Z" fill="#036733"/>
              </svg>
          </a>
      </div>
  </div>
  
  </section>
  <!-- / End products Section -->

  <!-- Recent posts (Blog) Section -->
  <section id="recent-posts" class="recent-posts section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>{{ trans('admin.recent_posts') }}</h2>
      <p>{{ trans('admin.recent_posts_description') }}</p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      <div class="row gy-5">
          @foreach($posts as $post)
              <div class="col-xl-4 col-md-6">
                  <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                      <div class="post-img position-relative overflow-hidden">
                          <img src="{{it()->url($post->photo)}}" class="img-fluid" alt="{{ $post->title_en }}" loading="lazy" />
                          <span class="post-date">{{ $post->created_at->format('F j') }}</span>
                      </div>
                      <div class="post-content d-flex flex-column">
                          <h3 class="post-title"> {{$post['name_'. \L::l()]}}</h3>
                          <p> {!! \Illuminate\Support\Str::limit($post['description_' . \L::l()], 80, '...') !!}</p>
                          <hr />
                          <a href="{{ route('blog-details', $post->id) }}" class="readmore stretched-link">
                              <span>{{trans('admin.Read More')}}</span>
                              <i class="bi bi-arrow-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
              <!-- End post item -->
          @endforeach
      </div>

      <div class="view-more text-center mt-5" data-aos="fade-up">
          <a href="{{ route('blogs') }}">
            {{trans('admin.View More')}}
              <svg width="30" height="12" viewBox="0 0 30 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M29.5303 6.53033C29.8232 6.23744 29.8232 5.76256 29.5303 5.46967L24.7574 0.696699C24.4645 0.403806 23.9896 0.403806 23.6967 0.696699C23.4038 0.989593 23.4038 1.46447 23.6967 1.75736L27.9393 6L23.6967 10.2426C23.4038 10.5355 23.4038 11.0104 23.6967 11.3033C23.9896 11.5962 24.4645 11.5962 24.7574 11.3033L29.5303 6.53033ZM0 6.75H29V5.25H0V6.75Z" fill="#036733" />
              </svg>
          </a>
      </div>
  </div>
  </section>
  <!-- / End Recent posts Section -->

  <!-- stats Section -->
  <section id="stats" class="stats section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-3 col-6">
          <div class="stats-item w-100 h-100">
            <div>
              <span
                data-purecounter-start="0"
                data-purecounter-end="{{$pcpb->Partner}}"
                data-purecounter-duration="1"
                class="purecounter"
              ></span>
              <p>{{trans('admin.Partner')}}</p>
            </div>
          </div>
        </div>
        <!-- End Stats Item -->

        <div class="col-lg-3 col-6">
          <div class="stats-item w-100 h-100">
            <div>
              <span
                data-purecounter-start="0"
                data-purecounter-end="{{$pcpb->Certificates}}"
                data-purecounter-duration="1"
                class="purecounter"
              ></span>
              <p>{{trans('admin.Certificates')}}</p>
            </div>
          </div>
        </div>
        <!-- End Stats Item -->

        <div class="col-lg-3 col-6">
          <div class="stats-item w-100 h-100">
            <div>
              <span
                data-purecounter-start="0"
                data-purecounter-end="{{$pcpb->Products}}"
                data-purecounter-duration="1"
                class="purecounter"
              ></span>
              <p>{{trans('admin.Products')}}</p>
            </div>
          </div>
        </div>
        <!-- End Stats Item -->

        <div class="col-lg-3 col-6">
          <div class="stats-item w-100 h-100">
            <div>
              <span
                data-purecounter-start="0"
                data-purecounter-end="{{$pcpb->Branches}}"
                data-purecounter-duration="1"
                class="purecounter"
              ></span>
              <p>{{trans('admin.Branches')}}</p>
            </div>
          </div>
        </div>
        <!-- End Stats Item -->
      </div>
    </div>
  </section>
  <!--End stats Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">
    <div class="container">
      <div
        class="testimonials-title text-center"
        data-aos="fade-up"
        data-aos-delay="100"
      >
        <p>{{trans('admin.What Our Happy Clients Say')}}</p>
      </div>
      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            }
          }
        </script>
        <div class="swiper-wrapper" data-aos="fade-up" data-aos-delay="150">
          @foreach($clientSays as $clientSay)
              <div class="swiper-slide">
                  <div class="testimonial-item">
                      <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          <span>{!! $clientSay['description_'.\L::l()] !!}</span>
                          <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <img src="{{it()->url($clientSay->photo)}}" class="testimonial-img" alt="{{ $clientSay->name }}" />
                      <h3>{{ $clientSay->name }}</h3>
                      <h4>{{ $clientSay->title }}</h4>
                  </div>
              </div>
              <!-- End testimonial item -->
          @endforeach
      </div>
      
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- / End Testimonials Section -->

@endsection