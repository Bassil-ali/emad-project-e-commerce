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
				<a href="{{aurl('branches')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('branches/'.$branches->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('branches/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$branches->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$branches->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$branches->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['branches.destroy', $branches->id]
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
										
<form action="{{aurl('/branches/'.$branches->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="branches">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_ar" class="control-label">{{trans('admin.name_ar')}}</label>
        <input type="text" id="name_ar" name="name_ar" value="{{ $branches->name_ar }}" class="form-control" placeholder="{{trans('admin.name_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="name_en" class="control-label">{{trans('admin.name_en')}}</label>
        <input type="text" id="name_en" name="name_en" value="{{ $branches->name_en }}" class="form-control" placeholder="{{trans('admin.name_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="url_location" class="control-label">{{trans('admin.url_location')}}</label>
        <input type="text" id="url_location" name="url_location" value="{{ $branches->url_location }}" class="form-control" placeholder="{{trans('admin.url_location')}}" />
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="address_ar" class="control-label">{{trans('admin.address_ar')}}</label>
        <input type="text" id="address_ar" name="address_ar" value="{{ $branches->address_ar }}" class="form-control" placeholder="{{trans('admin.address_ar')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="address_en" class="control-label">{{trans('admin.address_en')}}</label>
        <input type="text" id="address_en" name="address_en" value="{{ $branches->address_en }}" class="form-control" placeholder="{{trans('admin.address_en')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="call_us" class="control-label">{{trans('admin.call_us')}}</label>
        <input type="text" id="call_us" name="call_us" value="{{ $branches->call_us }}" class="form-control" placeholder="{{trans('admin.call_us')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="open_hours" class="control-label">{{trans('admin.open_hours_and_days')}}</label>
        <input type="text" id="open_hours" name="open_hours" value="{{ $branches->open_hours }}" class="form-control" placeholder="{{trans('admin.open_hours')}}" />
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
		
