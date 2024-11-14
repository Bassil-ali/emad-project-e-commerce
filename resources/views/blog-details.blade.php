@extends('layout')
@section('title', trans('admin.blog_details'))
@section('content')
<!-- Alt categories Section -->
<section class="section blog-details mt-md-4 mt-2">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title pb-3 mb-md-2 mb-0" data-aos="fade-up" data-aos-delay="100">
            <h2>{{trans('admin.Our Blogs')}}</h2>
            <p>{{$blog['name_'.\L::l()]}}</p>
            <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
            </span>
        </div>

        <div class="row justify-content-center gy-5" data-aos="fade-up" data-aos-delay="150">
            <div class="col-md-10">
                <img src="{{it()->url($blog->photo)}}" class="blog-main-img mb-4" loading="lazy" alt="" />

                <p>
                    {!!$blog['description_'.\L::l()]!!}
                </p>
            </div>
        </div>
    </div>

    
       <div class="text-center mt-5" data-aos="fade-up">
           
           <a  href="{{$blog->product_url}}" class="primary-btn">
              {{trans('admin.watch product')}}
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.67027 14L3 12.3308L10.0515 5.27683H4.75413L4.7681 3H14V12.233H11.7078L11.7217 6.94603L4.67027 14Z" fill="white"></path>
                </svg>
              </a>
           
          
        </div>
    
</section>
<!-- /Alt Services Section -->

<section id="recent-posts" class="recent-posts section">
    <!-- Section Title -->
    <div class="container text-start section-title" data-aos="fade-up">
        <p>{{trans('Related Blogs')}}</p>
    </div>
    <!-- End Section Title -->

    <div class="container">
        <div class="row gy-5">
            @foreach ($blogs as $item)

            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-img position-relative overflow-hidden">
                        <img src="{{it()->url($item->photo)}}" class="img-fluid" alt="" loading="lazy" />
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

                        <a href="{{ url('blog-details/' . $blog->id) }}" class="readmore stretched-link">
                            <span>{{ trans('admin.Read More') }}</span><i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>
            <!-- End post item -->
        @endforeach
        <!-- End post item -->
    </div>
</div>
       
    

        <div class="view-more text-center mt-5" data-aos="fade-up">
            <a href="{{route('blogs')}}">{{trans('View More')}}
                <svg width="30" height="12" viewBox="0 0 30 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29.5303 6.53033C29.8232 6.23744 29.8232 5.76256 29.5303 5.46967L24.7574 0.696699C24.4645 0.403806 23.9896 0.403806 23.6967 0.696699C23.4038 0.989593 23.4038 1.46447 23.6967 1.75736L27.9393 6L23.6967 10.2426C23.4038 10.5355 23.4038 11.0104 23.6967 11.3033C23.9896 11.5962 24.4645 11.5962 24.7574 11.3033L29.5303 6.53033ZM0 6.75H29V5.25H0V6.75Z"
                        fill="#036733" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection