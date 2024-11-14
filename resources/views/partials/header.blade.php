<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    
    <meta
      name="description"
      content="{{trans('admin.meta-description')}}"
    />
    <meta
      name="keywords"
      content="{{trans('admin.meta-keywords')}}"
    />

    <!-- Favicons -->
    <link href="{{ url('assets') }}/home/img/logo.svg" rel="icon" />
    <link href="{{ url('assets') }}/home/img/logo.svg" rel="apple-touch-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    

    <!-- Vendor CSS Files -->
    <link
      href="{{ url('assets') }}/home/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />

     <!-- SweetAlert CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
     <!-- SweetAlert JS -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
      href="{{ url('assets') }}/home/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="{{ url('assets') }}/home/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="{{ url('assets') }}/home/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="{{ url('assets') }}/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

   
    @if (\L::l() == 'en')
         <!-- Main CSS File -->
        <link href="{{ url('assets') }}/home/css/main.css" rel="stylesheet" />
    @else
        
        <link href="{{ url('assets') }}/home/css/main-rtl.css" rel="stylesheet" />
    @endif
    <!-- Nice Select CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css">
<!-- Nice Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="a24490e2-a2f9-40ad-afed-158a3d2e004d";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
  </head>

  <body class="index-page">
    <!-- ======= Header ======= -->
    <header
      id="header"
      class="header position-relative d-flex align-items-center scroll-up-sticky"
    >
      <div class="container d-flex align-items-center justify-content-between">
        <a
          href="{{route('index')}}"
          class="logo d-flex align-items-center me-auto me-xl-0"
        >
          <img src="{{ url('assets') }}/home/img/logo.svg" alt="" />
        </a>

        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('index') }}" class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}">{{ trans('admin.home') }}</a></li>
            <li><a href="{{ route('about-us') }}" class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}">{{ trans('admin.about-us') }}</a></li>
            <li><a href="{{ route('categories') }}" class="nav-link {{ request()->routeIs('categories') ? 'active' : '' }}">{{ trans('admin.products') }}</a></li>
            <li><a href="{{ route('blogs') }}" class="nav-link {{ request()->routeIs('blogs') ? 'active' : '' }}">{{ trans('admin.blogs') }}</a></li>
            <li><a href="{{ route('partners') }}" class="nav-link {{ request()->routeIs('partners') ? 'active' : '' }}">{{ trans('admin.partners') }}</a></li>
            <li><a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">{{ trans('admin.gallery') }}</a></li>
            <li><a href="{{ route('branches') }}" class="nav-link {{ request()->routeIs('branches') ? 'active' : '' }}">{{ trans('admin.branches') }}</a></li>
            <!--   <li class="dropdown has-dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dd-box-shadow">
              <li><a href="#">Dropdown 1</a></li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
            
          </ul>

          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <!-- End Nav Menu -->

        <div class="btns">
            @if(count(\L::all()) > 0)
            @if(\L::l() == 'en')
          <a  href="{{aurl('lang/ar')}}" class="secondary-btn" href="index.html#about"> {{trans('admin.ar')}} </a>
          @else
          <a  href="{{aurl('lang/en')}}" class="secondary-btn" href="index.html#about"> {{trans('admin.en')}} </a>
          @endif
          @endif
          <a class="btn-getstarted" href="{{ route('about-us') }}">
            <img src="{{ url('assets') }}/home/img/icons/phone.svg" alt="" />
            {{ trans('admin.about-us') }}
          </a>
        </div>
      </div>
    </header>
    <!-- End Header -->