@extends('layout')

@section('title', trans('admin.partners'))
@section('content')
       <!-- Alt categories Section -->
            <img src="{{ url('assets') }}/home/img/21.png" class="shape" alt="Decorative Shape">

       <section class="section partner-sec ">
        <div class="container">
          <!-- Section Title -->
          <div
            class="section-title pb-3 mb-md-2 mb-0"
            data-aos="fade-up"
            data-aos-delay="100"
          >
          <div class="partners-section">
            <h2>{{ trans('admin.partners') }}</h2>
            <p>{{ trans('admin.our_partners') }}</p>
            <span>
              {{ trans('admin.partners_description') }}
            </span>
          </div>
          
          </div>

          <div
            class="row align-items-center mt-5"
            data-aos="fade-up"
            data-aos-delay="150"
          >
            <div class="col-md-12" style="padding-bottom: 4%;">
              <img
                src="{{it()->url($partner[0]->photo)}}" style="height: 35vh !important; width: 100% !important;"
                class="blog-main-img mb-4"
                loading="lazy"
                alt=""
              />

              {!!$partner[0]['description_'.\L::l()]!!}

              <a href="{{ route('be-partner',['partner']) }}" class="primary-btn">
                {{trans('admin.Become a Partners')}}
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
                  ></path>
                </svg>
              </a>
            </div>
            <div
            class="section-title pb-3 mb-md-2 mb-0"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="partners-section">
            
            <p>{{ trans('admin.career') }}</p>
           
          </div>
          </div>
            <div class="col-md-12">
              <img
                src="{{it()->url($partner[1]->photo)}}"
                class="blog-main-img mb-4" style="height: 35vh !important; width: 100% !important;"
                loading="lazy"
                alt=""
              />

              {!!$partner[1]['description_'.\L::l()]!!}

              <a href="{{ route('be-partner',['career']) }}" class="primary-btn mt-3" >
                {{trans('admin.be_career')}}
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
                  ></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- /Alt Services Section -->
@endsection