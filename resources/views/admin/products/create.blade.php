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
				<a href="{{ aurl('products') }}" class="dropdown-item">
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
								
<form action="{{aurl('/products')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="products">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Name_ar" class=" control-label">{{trans('admin.Name_ar')}}</label>
            <input type="text" id="Name_ar" name="Name_ar" value="{{old('Name_ar')}}" class="form-control" placeholder="{{trans('admin.Name_ar')}}" />
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
        <label for="title_ar" class=" control-label">{{trans('admin.title_ar')}}</label>
            <input type="text" id="title_ar" name="title_ar" value="{{old('title_ar')}}" class="form-control" placeholder="{{trans('admin.title_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="title_en" class=" control-label">{{trans('admin.title_en')}}</label>
            <input type="text" id="title_en" name="title_en" value="{{old('title_en')}}" class="form-control" placeholder="{{trans('admin.title_en')}}" />
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
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->$name_property }}
            </option>
        @endforeach
    </select>
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="main_photo">{{trans('admin.main_photo')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="main_photo" name="main_photo" class="custom-file-input" accept="image/*" placeholder="{{trans('admin.main_photo')}}" />
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="photos">{{ trans('admin.photos') }}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="photos" name="photos[]" class="custom-file-input" multiple accept="image/*" placeholder="{{ trans('admin.photos') }}" />
                <label class="custom-file-label" for="photos">{{ trans('admin.choose_files') }}</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>


<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="price" class=" control-label">{{trans('admin.price')}}</label>
            <input type="text" id="price" name="price" value="{{old('price')}}" class="form-control" placeholder="{{trans('admin.price')}}" />
    </div>
</div>
{{-- <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="number_of_calories" class=" control-label">{{trans('admin.number_of_calories')}}</label>
            <input type="text" id="number_of_calories" name="number_of_calories" value="{{old('number_of_calories')}}" class="form-control" placeholder="{{trans('admin.number_of_calories')}}" />
    </div>
</div> --}}
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
    <label for="ingredient_id">{{trans('admin.ingredient_id')}}</label>
    <select id="ingredient_id" name="ingredient_id[]" multiple="multiple" class="form-control select2" placeholder="{{trans('admin.ingredient_id')}}" >
                                
    @foreach(App\Models\ingredient::get() as $ingredient_id)
    @php
    $locale = app()->getLocale(); // Get the current locale, e.g., 'ar', 'en'
    
    @endphp
      @foreach(App\Models\Ingredient::all() as $ingredient)
      @php
          $locale = app()->getLocale(); // Get current locale
          $allergensProperty = 'Allergens_' . $locale;
          $caloriesProperty = 'Calories_per_serving_' . $locale;
          $packingProperty = 'Packing_' . $locale;
      @endphp
      <option value="{{ $ingredient->id }}" {{ old('ingredient_id') == $ingredient->id ? 'selected' : '' }}>
          {{ $ingredient->$allergensProperty ?? '-' }} - 
          {{ $ingredient->Barcode ?? '-' }} - 
          {{ $ingredient->Size ?? '-' }} - 
          {{ $ingredient->$caloriesProperty ?? '-' }} - 
          {{ $ingredient->$packingProperty ?? '-' }}
      </option>
  @endforeach
  
    @endforeach
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
	
