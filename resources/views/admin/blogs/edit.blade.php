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
				<a href="{{aurl('blogs')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('blogs/'.$blogs->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('blogs/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$blogs->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$blogs->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$blogs->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['blogs.destroy', $blogs->id]
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
										
<form action="{{aurl('/blogs/'.$blogs->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="blogs">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_ar" class="control-label">{{trans('admin.name_ar')}}</label>
        <input type="text" id="name_ar" name="name_ar" value="{{ $blogs->name_ar }}" class="form-control" placeholder="{{trans('admin.name_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_en" class="control-label">{{trans('admin.name_en')}}</label>
        <input type="text" id="name_en" name="name_en" value="{{ $blogs->name_en }}" class="form-control" placeholder="{{trans('admin.name_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				<label for="category_id" class="control-label">{{trans('admin.category_id')}}</label>

					<select id="category_id" name="category_id" class="form-control select2" placeholder="{{trans('admin.category_id')}}" >

    @foreach(App\Models\Category::pluck('name_ar','id') as $category_id)
      <option value="{{ $category_id->id }}" {{ $blogs->category_id == $category_id->id?"selected":"" }} >{{ $category_id->name_ar }}</option>
    @endforeach
</select>

		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="photo">{{trans('admin.photo')}}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="photo" name="photo" class="custom-file-input" placeholder="{{trans('admin.photo')}}" accept="image/*" />
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include("admin.show_image",["image"=>$blogs->photo])
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_en" class="control-label">{{trans('admin.description_en')}}</label>
            <textarea id="description_en" class="form-control ckeditor" placeholder="{{trans('admin.description_en')}}"
            name="description_en" >{{$blogs->description_en}}</textarea>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_ar" class="control-label">{{trans('admin.description_ar')}}</label>
            <textarea id="description_ar" class="form-control ckeditor" placeholder="{{trans('admin.description_ar')}}"
            name="description_ar" >{{$blogs->description_en}}</textarea>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="product_url" class=" control-label">{{trans('admin.product_url')}}</label>
            <input type="text" id="product_url" name="product_url" value="{{old('product_url')}}" class="form-control" placeholder="{{trans('admin.product_url')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="product_url" class="control-label">{{trans('admin.product_url')}}</label>
        <input type="text" id="product_url" name="product_url" value="{{ $blogs->product_url }}" class="form-control" placeholder="{{trans('admin.product_url')}}" />
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
		
