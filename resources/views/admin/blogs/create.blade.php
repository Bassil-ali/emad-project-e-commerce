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
				<a href="{{ aurl('blogs') }}" class="dropdown-item">
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
								
<form action="{{aurl('/blogs')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="blogs">
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
                <label for="category_id">{{trans('admin.category_id')}}</label>
                            <select id="category_id" name="category_id" class="form-control select2" placeholder="{{trans('admin.category_id')}}" >
    @foreach(App\Models\Category::get() as $category_id)
      <option value="{{ $category_id->id }}" {{old('category_id') == $category_id->id?'selected':''}}>{{ $category_id->name_ar }}</option>
    @endforeach
   </select>
    </div>
</div>
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
        <label for="description_ar" class="control-label">{{trans('admin.description_ar')}}</label>
            <textarea id="description_ar" class="form-control ckeditor" placeholder="{{trans('admin.description_ar')}}"
            name="description_ar" >{{old('description_ar')}}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_en" class="control-label">{{trans('admin.description_en')}}</label>
            <textarea id="description_en" class="form-control ckeditor" placeholder="{{trans('admin.description_en')}}"
            name="description_en" >{{old('description_en')}}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="product_url" class=" control-label">{{trans('admin.product_url')}}</label>
            <input type="text" id="product_url" name="product_url" value="{{old('product_url')}}" class="form-control" placeholder="{{trans('admin.product_url')}}" />
    </div>
</div>

</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="product_url" class=" control-label">{{trans('admin.created_date')}}</label>
            <input type="datetime-local" id="created_date" name="created_date" value="{{old('created_date')}}" class="form-control" placeholder="{{trans('admin.created_date')}}" />
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
	
