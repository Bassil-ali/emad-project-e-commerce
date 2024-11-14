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
				<a href="{{ aurl('careers') }}" class="dropdown-item">
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
								
<form action="{{aurl('/careers')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="careers">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Full_Name" class=" control-label">{{trans('admin.Full_Name')}}</label>
            <input type="text" id="Full_Name" name="Full_Name" value="{{old('Full_Name')}}" class="form-control" placeholder="{{trans('admin.Full_Name')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Nationality" class=" control-label">{{trans('admin.Nationality')}}</label>
            <input type="text" id="Nationality" name="Nationality" value="{{old('Nationality')}}" class="form-control" placeholder="{{trans('admin.Nationality')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Occupation" class=" control-label">{{trans('admin.Occupation')}}</label>
            <input type="text" id="Occupation" name="Occupation" value="{{old('Occupation')}}" class="form-control" placeholder="{{trans('admin.Occupation')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Current_Location" class=" control-label">{{trans('admin.Current_Location')}}</label>
            <input type="text" id="Current_Location" name="Current_Location" value="{{old('Current_Location')}}" class="form-control" placeholder="{{trans('admin.Current_Location')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Age" class=" control-label">{{trans('admin.Age')}}</label>
            <input type="text" id="Age" name="Age" value="{{old('Age')}}" class="form-control" placeholder="{{trans('admin.Age')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Mobile_Number" class=" control-label">{{trans('admin.Mobile_Number')}}</label>
            <input type="text" id="Mobile_Number" name="Mobile_Number" value="{{old('Mobile_Number')}}" class="form-control" placeholder="{{trans('admin.Mobile_Number')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Email" class="control-label">{{trans('admin.Email')}}</label>
            <input type="email" id="Email" name="Email" value="{{old('Email')}}" class="form-control" placeholder="{{trans('admin.Email')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Landline_Number" class=" control-label">{{trans('admin.Landline_Number')}}</label>
            <input type="text" id="Landline_Number" name="Landline_Number" value="{{old('Landline_Number')}}" class="form-control" placeholder="{{trans('admin.Landline_Number')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Occupation_Interest" class=" control-label">{{trans('admin.Occupation_Interest')}}</label>
            <input type="text" id="Occupation_Interest" name="Occupation_Interest" value="{{old('Occupation_Interest')}}" class="form-control" placeholder="{{trans('admin.Occupation_Interest')}}" />
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="attach_cv">{{trans('admin.attach_cv')}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" id="attach_cv" name="attach_cv" class="custom-file-input" accept="" placeholder="{{trans('admin.attach_cv')}}" />
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="message" class="control-label">{{trans('admin.message')}}</label>
            <textarea id="message" class="form-control ckeditor" placeholder="{{trans('admin.message')}}"
            name="message" >{{old('message')}}</textarea>
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
	
