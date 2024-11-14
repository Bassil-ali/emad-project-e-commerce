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
				<a href="{{aurl('homepagemain')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('homepagemain/'.$homepagemain->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('homepagemain/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$homepagemain->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$homepagemain->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$homepagemain->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['homepagemain.destroy', $homepagemain->id]
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
										
<form action="{{aurl('/homepagemain/'.$homepagemain->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="homepagemain">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="first_title_ar" class="control-label">{{trans('admin.first_title_ar')}}</label>
        <input type="text" id="first_title_ar" name="first_title_ar" value="{{ $homepagemain->first_title_ar }}" class="form-control" placeholder="{{trans('admin.first_title_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_ar" class="control-label">{{trans('admin.description_ar')}}</label>
        <textarea id="description_ar" class="form-control" placeholder="{{trans('admin.description_ar')}}"
        name="description_ar" >{{ $homepagemain->description_ar }}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="second_title_ar" class="control-label">{{trans('admin.second_title_ar')}}</label>
        <input type="text" id="second_title_ar" name="second_title_ar" value="{{ $homepagemain->second_title_ar }}" class="form-control" placeholder="{{trans('admin.second_title_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="YouTupe_url" class="control-label">{{trans('admin.YouTupe_url')}}</label>
        <input type="text" id="YouTupe_url" name="YouTupe_url" value="{{ $homepagemain->YouTupe_url }}" class="form-control" placeholder="{{trans('admin.YouTupe_url')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="first_title_en" class="control-label">{{trans('admin.first_title_en')}}</label>
        <input type="text" id="first_title_en" name="first_title_en" value="{{ $homepagemain->first_title_en }}" class="form-control" placeholder="{{trans('admin.first_title_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="description_en" class="control-label">{{trans('admin.description_en')}}</label>
        <textarea id="description_en" class="form-control" placeholder="{{trans('admin.description_en')}}"
        name="description_en" >{{ $homepagemain->description_en }}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="second_title_en" class="control-label">{{trans('admin.second_title_en')}}</label>
        <input type="text" id="second_title_en" name="second_title_en" value="{{ $homepagemain->second_title_en }}" class="form-control" placeholder="{{trans('admin.second_title_en')}}" />
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
		
