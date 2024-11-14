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
				<a href="{{ aurl('pcpbs') }}" class="dropdown-item">
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
								
<form action="{{aurl('/pcpbs')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="pcpbs">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Partner" class=" control-label">{{trans('admin.Partner')}}</label>
            <input type="text" id="Partner" name="Partner" value="{{old('Partner')}}" class="form-control" placeholder="{{trans('admin.Partner')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Certificates" class=" control-label">{{trans('admin.Certificates')}}</label>
            <input type="text" id="Certificates" name="Certificates" value="{{old('Certificates')}}" class="form-control" placeholder="{{trans('admin.Certificates')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Products" class=" control-label">{{trans('admin.Products')}}</label>
            <input type="text" id="Products" name="Products" value="{{old('Products')}}" class="form-control" placeholder="{{trans('admin.Products')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Branches" class=" control-label">{{trans('admin.Branches')}}</label>
            <input type="text" id="Branches" name="Branches" value="{{old('Branches')}}" class="form-control" placeholder="{{trans('admin.Branches')}}" />
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
	
