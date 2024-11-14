@extends('admin.index')
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">
		<div class="btn-group">
			<button type="button" class="btn btn-default">
			{{ !empty($title)?$title:'' }}
			</button>
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</button>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('branches') }}" class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
								
<form action="{{aurl('/branches')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="branches">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_ar" class=" control-label">{{trans('admin.name_ar')}}</label>
            <input type="text" id="name_ar" name="name_ar" value="{{old('name_ar')}}" class="form-control" placeholder="{{trans('admin.name_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_en" class=" control-label">{{trans('admin.name_en')}}</label>
            <input type="text" id="name_en" name="name_en" value="{{old('name_en')}}" class="form-control" placeholder="{{trans('admin.name_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="url_location" class=" control-label">{{trans('admin.url_location')}}</label>
            <input type="text" id="url_location" name="url_location" value="{{old('url_location')}}" class="form-control" placeholder="{{trans('admin.url_location')}}" />
    </div>
</div>

</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="address_ar" class=" control-label">{{trans('admin.address_ar')}}</label>
            <input type="text" id="address_ar" name="address_ar" value="{{old('address_ar')}}" class="form-control" placeholder="{{trans('admin.address_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="adress_en" class=" control-label">{{trans('admin.address_en')}}</label>
            <input type="text" id="address_en" name="address_en" value="{{old('address_en')}}" class="form-control" placeholder="{{trans('admin.address_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="call_us" class=" control-label">{{trans('admin.call_us')}}</label>
            <input type="text" id="call_us" name="call_us" value="{{old('call_us')}}" class="form-control" placeholder="{{trans('admin.call_us')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="open_hours" class=" control-label">{{trans('admin.open_hours_and days')}}</label>
            <input type="text" id="open_hours" name="open_hours" value="{{old('open_hours')}}" class="form-control" placeholder="{{trans('admin.open_hours')}}" />
    </div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
</form></div>
					</div>
	@endsection
	
