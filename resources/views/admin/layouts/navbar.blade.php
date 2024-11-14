  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ aurl('logout') }}" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> {{ trans('admin.logout') }}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ aurl('lock/screen') }}?email={{ admin()->user()->email }}" class="nav-link"><i class="nav-icon fa fa-user-lock"></i> {{ trans('admin.lock_screen') }}</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}


    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      @if(count(L::all()) > 0)
       <!-- Language Dropdown Menu -->
      <li class="nav-item  dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-language"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg  languages {{ app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left' }}">
          
          @foreach(L::all() as $l)
             @if($l != 'fr')
            <a href="{{aurl('lang/'.$l)}}" class="dropdown-item">
            <i class="fas fa-language"></i> {{trans('admin.'.$l)}} </a>
            @endif
        @endforeach
        </div>
      </li>
      <!-- Language Dropdown Menu End-->
      @endif
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
     
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- /.navbar -->
<!-- Main Sidebar Menu Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ aurl('/') }}" class="brand-link">
    @if(!empty(setting()->logo))
    <img src="{{ it()->url(setting()->logo) }}" alt="{{ setting()->{l('sitename')} }}" class="brand-image img-circle elevation-3" style="opacity: .8">
    @endif
    <span class="brand-text font-weight-light">{{ setting()->{l('sitename')} }}</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(!empty(admin()->user()->photo_profile))
        <img src="{{ it()->url(admin()->user()->photo_profile) }}" class="img-circle elevation-2" alt="{{ admin()->user()->name }}" style="margin-right:15px">
        @else
        <img src="{{ url('assets') }}/img/avatar5.png" class="img-circle elevation-2" alt="{{ admin()->user()->name }}" style="margin-right:15px">
        @endif
      </div>
      <div class="info">
        <a href="{{ aurl('account') }}" class="d-block">{{ admin()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
