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
				<a href="{{ aurl('homepagemain') }}" class="dropdown-item">
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
								
<form action="{{aurl('/homepagemain')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="homepagemain">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="first_title_ar" class=" control-label">{{trans('admin.first_title_ar')}}</label>
            <input type="text" id="first_title_ar" name="first_title_ar" value="{{old('first_title_ar')}}" class="form-control" placeholder="{{trans('admin.first_title_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_ar" class="control-label">{{trans('admin.description_ar')}}</label>
            <textarea id="description_ar" class="form-control" placeholder="{{trans('admin.description_ar')}}"
            name="description_ar" >{{old('description_ar')}}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="second_title_ar" class=" control-label">{{trans('admin.second_title_ar')}}</label>
            <input type="text" id="second_title_ar" name="second_title_ar" value="{{old('second_title_ar')}}" class="form-control" placeholder="{{trans('admin.second_title_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="first_title_en" class=" control-label">{{trans('admin.first_title_en')}}</label>
            <input type="text" id="first_title_en" name="first_title_en" value="{{old('first_title_en')}}" class="form-control" placeholder="{{trans('admin.first_title_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_en" class="control-label">{{trans('admin.description_en')}}</label>
            <textarea id="description_en" class="form-control" placeholder="{{trans('admin.description_en')}}"
            name="description_en" >{{old('description_en')}}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="second_title_en" class=" control-label">{{trans('admin.second_title_en')}}</label>
            <input type="text" id="second_title_en" name="second_title_en" value="{{old('second_title_en')}}" class="form-control" placeholder="{{trans('admin.second_title_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="YouTupe_url" class=" control-label">{{trans('admin.YouTupe_url')}}</label>
            <input type="text" id="YouTupe_url" name="YouTupe_url" value="{{old('YouTupe_url')}}" class="form-control" placeholder="{{trans('admin.YouTupe_url')}}" />
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
	
