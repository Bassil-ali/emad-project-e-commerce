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
				<a href="{{ aurl('homepage') }}" class="dropdown-item">
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
								
<form action="{{aurl('/homepage')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="homepage">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="first_title" class=" control-label">{{trans('admin.first_title')}}</label>
            <input type="text" id="first_title" name="first_title" value="{{old('first_title')}}" class="form-control" placeholder="{{trans('admin.first_title')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description" class="control-label">{{trans('admin.description')}}</label>
            <textarea id="description" class="form-control" placeholder="{{trans('admin.description')}}"
            name="description" >{{old('description')}}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="second_title" class=" control-label">{{trans('admin.second_title')}}</label>
            <input type="text" id="second_title" name="second_title" value="{{old('second_title')}}" class="form-control" placeholder="{{trans('admin.second_title')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="client_photo">{{trans('admin.client_photo')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="client_photo" name="client_photo" class="custom-file-input" accept="image/*" placeholder="{{trans('admin.client_photo')}}" />
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="vedio">{{trans('admin.vedio')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="vedio" name="vedio" class="custom-file-input" accept="video/mp4" placeholder="{{trans('admin.vedio')}}" />
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
	
