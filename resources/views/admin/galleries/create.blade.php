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
				<a href="{{ aurl('galleries') }}" class="dropdown-item">
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
								
<form action="{{aurl('/galleries')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="galleries">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="photo">{{trans('admin.photo')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="photo" name="photo" class="custom-file-input" accept="image/*" placeholder="{{trans('admin.photo')}}" />
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Address" class=" control-label">{{trans('admin.Address')}}</label>
            <input type="text" id="Address" name="Address" value="{{old('Address')}}" class="form-control" placeholder="{{trans('admin.Address')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
				<label for="category">{{trans('admin.category')}}</label>
							<select id="category" name="category" class="form-control select2" placeholder="{{trans('admin.category')}}" >

<option value="1" {{old('category') == '1'?'selected':''}} >{{trans('admin.company')}}</option>
<option value="2" {{old('category') == '2'?'selected':''}} >{{trans('admin.branches')}}</option>
<option value="3" {{old('category') == '3'?'selected':''}} >{{trans('admin.factories')}}</option>
   </select>
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
	
