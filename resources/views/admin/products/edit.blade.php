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
				<a href="{{aurl('products')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('products/'.$products->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('products/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$products->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$products->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$products->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['products.destroy', $products->id]
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
										
<form action="{{aurl('/products/'.$products->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="products">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Name_ar" class="control-label">{{trans('admin.Name_ar')}}</label>
        <input type="text" id="Name_ar" name="Name_ar" value="{{ $products->Name_ar }}" class="form-control" placeholder="{{trans('admin.Name_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_en" class="control-label">{{trans('admin.name_en')}}</label>
        <input type="text" id="name_en" name="name_en" value="{{ $products->name_en }}" class="form-control" placeholder="{{trans('admin.name_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="title_ar" class="control-label">{{trans('admin.title_ar')}}</label>
        <input type="text" id="title_ar" name="title_ar" value="{{ $products->title_ar }}" class="form-control" placeholder="{{trans('admin.title_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="title_en" class="control-label">{{trans('admin.title_en')}}</label>
        <input type="text" id="title_en" name="title_en" value="{{ $products->title_en }}" class="form-control" placeholder="{{trans('admin.title_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="category_id">{{ trans('admin.category') }}</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">{{ trans('admin.select_category') }}</option>
            @foreach(App\Models\category::get() as $category)
            @php
            $locale = app()->getLocale(); // Get the current locale, e.g., 'ar', 'en'
            $name_property = 'name_' . $locale; // Create dynamic property name, e.g., 'ingredient_ar'
            @endphp
                <option value="{{ $category->id }}" {{ old('category_id', $products->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->$name_property }}
                </option>
            @endforeach
        </select>
    </div>
    </div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="main_photo">{{trans('admin.main_photo')}}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="main_photo" name="main_photo" class="custom-file-input" placeholder="{{trans('admin.main_photo')}}" accept="image/*" />
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include("admin.show_image",["image"=>$products->main_photo])
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="row">
        <div class="col-md-8">

            <div class="form-group">
                <label for="photos">{{trans('admin.photos')}}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="photos" name="photos[]" class="custom-file-input" multiple  accept="" placeholder="{{trans('admin.photos')}}" />
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
            <!-- Display existing photos -->
        <div class="existing-photos">
            @foreach(json_decode($products->photos, true) as $photo)
                <div class="photo-item">
                    <img src="{{ asset('storage/' . $photo) }}" alt="Photo" width="100">
                    <!-- Checkbox to mark the photo for deletion -->
                    <input type="checkbox" name="remove_photos[]" value="{{ $photo }}"> {{ trans('admin.remove') }}
                </div>
            @endforeach
        </div>
        </div>
        <div class="col-md-4" style="padding-top: 30px;">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <a href="{{ it()->url($products->photos) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="price" class="control-label">{{trans('admin.price')}}</label>
        <input type="text" id="price" name="price" value="{{ $products->price }}" class="form-control" placeholder="{{trans('admin.price')}}" />
    </div>
</div>
{{-- <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="number_of_calories" class="control-label">{{trans('admin.number_of_calories')}}</label>
        <input type="text" id="number_of_calories" name="number_of_calories" value="{{ $products->number_of_calories }}" class="form-control" placeholder="{{trans('admin.number_of_calories')}}" />
    </div>
</div> --}}
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_ar" class="control-label">{{trans('admin.description_ar')}}</label>
        <textarea id="description_ar" class="form-control ckeditor" placeholder="{{trans('admin.description_ar')}}"
        name="description_ar" >{{ $products->description_ar }}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_en" class="control-label">{{trans('admin.description_en')}}</label>
        <textarea id="description_en" class="form-control ckeditor" placeholder="{{trans('admin.description_en')}}"
        name="description_en" >{{ $products->description_en }}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

        <div class="form-group">
            <label for="ingredient_id">{{ trans('admin.ingredient_id') }}</label>
            <select id="ingredient_id" name="ingredient[]" class="form-control select2" multiple="multiple">
                @foreach(App\Models\ingredient::get() as $ingredient)
                @php
                $locale = app()->getLocale(); // Get the current locale, e.g., 'ar', 'en'
                $ingredient_property = 'ingredient_' . $locale; // Create dynamic property name, e.g., 'ingredient_ar'
                @endphp
                    <option value="{{ $ingredient->id }}"
                        {{ in_array($ingredient->id, $products->ingredients->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $ingredient->$ingredient_property }}
                    </option>
                @endforeach
            </select>
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
		
