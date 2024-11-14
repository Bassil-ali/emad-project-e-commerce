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
				<a href="{{aurl('partners')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('partners/'.$partners->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('partners/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$partners->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$partners->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$partners->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['partners.destroy', $partners->id]
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
										
<form action="{{aurl('/partners/'.$partners->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="partners">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Partner_Type" class="control-label">{{trans('admin.Partner_Type')}}</label>
        <input type="text" id="Partner_Type" name="Partner_Type" value="{{ $partners->Partner_Type }}" class="form-control" placeholder="{{trans('admin.Partner_Type')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="business_name" class="control-label">{{trans('admin.business_name')}}</label>
        <input type="text" id="business_name" name="business_name" value="{{ $partners->business_name }}" class="form-control" placeholder="{{trans('admin.business_name')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="phone_number" class="control-label">{{trans('admin.phone_number')}}</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ $partners->phone_number }}" class="form-control" placeholder="{{trans('admin.phone_number')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="email_address" class="control-label">{{trans('admin.email_address')}}</label>
            <input type="email" id="email_address" name="email_address" value="{{ $partners->email_address }}" class="form-control" placeholder="{{trans('admin.email_address')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="message" class="control-label">{{trans('admin.message')}}</label>
        <textarea id="message" class="form-control ckeditor" placeholder="{{trans('admin.message')}}"
        name="message" >{{ $partners->message }}</textarea>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="file">{{trans('admin.file')}}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="file" name="file" class="custom-file-input"  accept="" placeholder="{{trans('admin.file')}}" />
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding-top: 30px;">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <a href="{{ it()->url($partners->file) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
                </div>
            </div>
        </div>
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
		
