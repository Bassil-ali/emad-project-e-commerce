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
				<a href="{{ aurl('orders') }}" class="dropdown-item">
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
								
<form action="{{aurl('/orders')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="orders">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="product_url" class=" control-label">{{trans('admin.product_url')}}</label>
            <input type="text" id="product_url" name="product_url" value="{{old('product_url')}}" class="form-control" placeholder="{{trans('admin.product_url')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="full_name" class=" control-label">{{trans('admin.full_name')}}</label>
            <input type="text" id="full_name" name="full_name" value="{{old('full_name')}}" class="form-control" placeholder="{{trans('admin.full_name')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="contact_email" class=" control-label">{{trans('admin.contact_email')}}</label>
            <input type="text" id="contact_email" name="contact_email" value="{{old('contact_email')}}" class="form-control" placeholder="{{trans('admin.contact_email')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="message" class="control-label">{{trans('admin.message')}}</label>
            <textarea id="message" class="form-control ckeditor" placeholder="{{trans('admin.message')}}"
            name="message" >{{old('message')}}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="mobile" class=" control-label">{{trans('admin.mobile')}}</label>
            <input type="text" id="mobile" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="{{trans('admin.mobile')}}" />
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
	
