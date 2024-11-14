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
				<a href="{{ aurl('ingredients') }}" class="dropdown-item">
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
								
<form action="{{aurl('/ingredients')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="ingredients">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Allergens_ar" class=" control-label">{{trans('admin.Allergens_ar')}}</label>
            <input type="text" id="Allergens_ar" name="Allergens_ar" value="{{old('Allergens_ar')}}" class="form-control" placeholder="{{trans('admin.Allergens_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Allergens_en" class=" control-label">{{trans('admin.Allergens_en')}}</label>
            <input type="text" id="Allergens_en" name="Allergens_en" value="{{old('Allergens_en')}}" class="form-control" placeholder="{{trans('admin.Allergens_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Calories_per_serving_ar" class=" control-label">{{trans('admin.Calories_per_serving_ar')}}</label>
            <input type="text" id="Calories_per_serving_ar" name="Calories_per_serving_ar" value="{{old('Calories_per_serving_ar')}}" class="form-control" placeholder="{{trans('admin.Calories_per_serving_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Calories_per_serving_en" class=" control-label">{{trans('admin.Calories_per_serving_en')}}</label>
            <input type="text" id="Calories_per_serving_en" name="Calories_per_serving_en" value="{{old('Calories_per_serving_en')}}" class="form-control" placeholder="{{trans('admin.Calories_per_serving_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Barcode" class=" control-label">{{trans('admin.Barcode')}}</label>
            <input type="text" id="Barcode" name="Barcode" value="{{old('Barcode')}}" class="form-control" placeholder="{{trans('admin.Barcode')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Size" class=" control-label">{{trans('admin.Size')}}</label>
            <input type="text" id="Size" name="Size" value="{{old('Size')}}" class="form-control" placeholder="{{trans('admin.Size')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Packing_ar" class=" control-label">{{trans('admin.Packing_ar')}}</label>
            <input type="text" id="Packing_ar" name="Packing_ar" value="{{old('Packing_ar')}}" class="form-control" placeholder="{{trans('admin.Packing_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Packing_en" class=" control-label">{{trans('admin.Packing_en')}}</label>
            <input type="text" id="Packing_en" name="Packing_en" value="{{old('Packing_en')}}" class="form-control" placeholder="{{trans('admin.Packing_en')}}" />
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
	
