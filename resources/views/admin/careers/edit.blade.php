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
				<a href="{{aurl('careers')}}" class="dropdown-item">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('careers/'.$careers->id)}}" class="dropdown-item">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" href="{{aurl('careers/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$careers->id}}" class="dropdown-item" href="">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$careers->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$careers->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['careers.destroy', $careers->id]
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
										
<form action="{{aurl('/careers/'.$careers->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="careers">
<div class="row"><input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Full_Name" class="control-label">{{trans('admin.Full_Name')}}</label>
        <input type="text" id="Full_Name" name="Full_Name" value="{{ $careers->Full_Name }}" class="form-control" placeholder="{{trans('admin.Full_Name')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Nationality" class="control-label">{{trans('admin.Nationality')}}</label>
        <input type="text" id="Nationality" name="Nationality" value="{{ $careers->Nationality }}" class="form-control" placeholder="{{trans('admin.Nationality')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Occupation" class="control-label">{{trans('admin.Occupation')}}</label>
        <input type="text" id="Occupation" name="Occupation" value="{{ $careers->Occupation }}" class="form-control" placeholder="{{trans('admin.Occupation')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Current_Location" class="control-label">{{trans('admin.Current_Location')}}</label>
        <input type="text" id="Current_Location" name="Current_Location" value="{{ $careers->Current_Location }}" class="form-control" placeholder="{{trans('admin.Current_Location')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Age" class="control-label">{{trans('admin.Age')}}</label>
        <input type="text" id="Age" name="Age" value="{{ $careers->Age }}" class="form-control" placeholder="{{trans('admin.Age')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Mobile_Number" class="control-label">{{trans('admin.Mobile_Number')}}</label>
        <input type="text" id="Mobile_Number" name="Mobile_Number" value="{{ $careers->Mobile_Number }}" class="form-control" placeholder="{{trans('admin.Mobile_Number')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Email" class="control-label">{{trans('admin.Email')}}</label>
            <input type="email" id="Email" name="Email" value="{{ $careers->Email }}" class="form-control" placeholder="{{trans('admin.Email')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Landline_Number" class="control-label">{{trans('admin.Landline_Number')}}</label>
        <input type="text" id="Landline_Number" name="Landline_Number" value="{{ $careers->Landline_Number }}" class="form-control" placeholder="{{trans('admin.Landline_Number')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Occupation_Interest" class="control-label">{{trans('admin.Occupation_Interest')}}</label>
        <input type="text" id="Occupation_Interest" name="Occupation_Interest" value="{{ $careers->Occupation_Interest }}" class="form-control" placeholder="{{trans('admin.Occupation_Interest')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="attach_cv">{{trans('admin.attach_cv')}}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="attach_cv" name="attach_cv" class="custom-file-input"  accept="" placeholder="{{trans('admin.attach_cv')}}" />
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
                    <a href="{{ it()->url($careers->attach_cv) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="message" class="control-label">{{trans('admin.message')}}</label>
        <textarea id="message" class="form-control ckeditor" placeholder="{{trans('admin.message')}}"
        name="message" >{{ $careers->message }}</textarea>
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
		
