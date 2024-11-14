@extends('admin.index')
@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">
		<div class="btn-group">
			<button type="button" class="btn btn-default">{{!empty($title)?$title:''}}</button>
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</button>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('ingredients')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('ingredients/'.$ingredients->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('ingredients/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$ingredients->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$ingredients->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$ingredients->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['ingredients.destroy', $ingredients->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
										
<form action="{{aurl('/ingredients/'.$ingredients->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="ingredients">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Allergens_ar" class="control-label">{{trans('admin.Allergens_ar')}}</label>
        <input type="text" id="Allergens_ar" name="Allergens_ar" value="{{ $ingredients->Allergens_ar }}" class="form-control" placeholder="{{trans('admin.Allergens_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Allergens_en" class="control-label">{{trans('admin.Allergens_en')}}</label>
        <input type="text" id="Allergens_en" name="Allergens_en" value="{{ $ingredients->Allergens_en }}" class="form-control" placeholder="{{trans('admin.Allergens_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Calories_per_serving_ar" class="control-label">{{trans('admin.Calories_per_serving_ar')}}</label>
        <input type="text" id="Calories_per_serving_ar" name="Calories_per_serving_ar" value="{{ $ingredients->Calories_per_serving_ar }}" class="form-control" placeholder="{{trans('admin.Calories_per_serving_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Calories_per_serving_en" class="control-label">{{trans('admin.Calories_per_serving_en')}}</label>
        <input type="text" id="Calories_per_serving_en" name="Calories_per_serving_en" value="{{ $ingredients->Calories_per_serving_en }}" class="form-control" placeholder="{{trans('admin.Calories_per_serving_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Barcode" class="control-label">{{trans('admin.Barcode')}}</label>
        <input type="text" id="Barcode" name="Barcode" value="{{ $ingredients->Barcode }}" class="form-control" placeholder="{{trans('admin.Barcode')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Size" class="control-label">{{trans('admin.Size')}}</label>
        <input type="text" id="Size" name="Size" value="{{ $ingredients->Size }}" class="form-control" placeholder="{{trans('admin.Size')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Packing_ar" class="control-label">{{trans('admin.Packing_ar')}}</label>
        <input type="text" id="Packing_ar" name="Packing_ar" value="{{ $ingredients->Packing_ar }}" class="form-control" placeholder="{{trans('admin.Packing_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Packing_en" class="control-label">{{trans('admin.Packing_en')}}</label>
        <input type="text" id="Packing_en" name="Packing_en" value="{{ $ingredients->Packing_en }}" class="form-control" placeholder="{{trans('admin.Packing_en')}}" />
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
</form>
</div>
</div>
		@endsection
		
