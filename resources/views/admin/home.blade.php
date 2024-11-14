@extends('admin.index')
@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ \App\Models\Subscription::count() }}</h3>
        <p>{{ trans('admin.SendEmail') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ route('sendemails.index') }}" class="small-box-footer">{{ trans('admin.More_info') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ \App\Models\Product::count() }}</h3>
        <p>{{ trans('admin.products') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ route('products.index') }}" class="small-box-footer">{{ trans('admin.More_info') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ \App\Models\Partner::count() }}</h3>
        <p>{{ trans('admin.partners and Careers') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('partners.index') }}" class="small-box-footer">{{ trans('admin.More_info') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ \App\Models\Order::count() }}</h3>
        <p>{{ trans('admin.orders') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ route('orders.index') }}" class="small-box-footer">{{ trans('admin.More_info') }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

 
</div>

     
    </div>
    <!-- /.row (main row) -->
    @endsection