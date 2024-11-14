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
				<a href="{{aurl('categories')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item" href="{{aurl('categories/'.$categories->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item" href="{{aurl('categories/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$categories->id}}" class="dropdown-item" href="">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$categories->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$categories->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['categories.destroy', $categories->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						 <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
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
		<div class="row">			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('admin.id')}} :</b> {{$categories->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			<div class="col-md-6 col-lg-6 col-xs-6">
				<b>{{trans('admin.name_ar')}} :</b>
				{!! $categories->name_ar !!}
			</div>
			<div class="col-md-6 col-lg-6 col-xs-6">
				<b>{{trans('admin.name_en')}} :</b>
				{!! $categories->name_en !!}
			</div>
			<div class="col-md-6 col-lg-6 col-xs-6">
				<b>{{trans('admin.description_ar')}} :</b>
				{!! $categories->description_ar !!}
			</div>
			<div class="col-md-6 col-lg-6 col-xs-6">
				<b>{{trans('admin.description_en')}} :</b>
				{!! $categories->description_en !!}
			</div>
			<div class="col-md-6 col-lg-6 col-xs-6">
				<div class="row">
					<div class="col-md-8 col-lg-4 col-xs-12">
					  <b>{{trans('admin.photo')}} :</b>
					</div>
					<div class="col-md-2 col-lg-2 col-xs-12">
						
					</div>
					<div class="col-md-2 col-lg-2 col-xs-12">
						<a href="{{ it()->url($categories->photo) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection