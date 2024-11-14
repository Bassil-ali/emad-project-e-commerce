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
				<a href="{{ aurl('partners') }}" class="dropdown-item">
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
								
<form action="{{aurl('/partners')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="partners">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Partner_Type" class=" control-label">{{trans('admin.Partner_Type')}}</label>
            <input type="text" id="partner_type" name="partner_type" value="{{old('Partner_Type')}}" class="form-control" placeholder="{{trans('admin.Partner_Type')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="business_name" class=" control-label">{{trans('admin.business_name')}}</label>
            <input type="text" id="business_name" name="business_name" value="{{old('business_name')}}" class="form-control" placeholder="{{trans('admin.business_name')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="phone_number" class=" control-label">{{trans('admin.phone_number')}}</label>
            <input type="text" id="phone_number" name="phone_number" value="{{old('phone_number')}}" class="form-control" placeholder="{{trans('admin.phone_number')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="email_address" class="control-label">{{trans('admin.email_address')}}</label>
            <input type="email" id="email_address" name="email_address" value="{{old('email_address')}}" class="form-control" placeholder="{{trans('admin.email_address')}}" />
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
        <label for="file">{{trans('admin.file')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="file" name="file" class="custom-file-input" accept="" placeholder="{{trans('admin.file')}}" />
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
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
	
