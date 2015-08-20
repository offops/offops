@extends('layouts.default')

@section('content')
<div class="container">
	<div class="col-md-12">
		{!! Form::open([
			'method' => 'POST',
			'route'  => 'companies.store',
			'class'  => 'form-horizontal'
		]) !!}

		<div class="form-group">
		    {!! Form::label('company_name', 'Company Name') !!}
		    {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('company_name') }}</small>
		</div>

		<div class="form-group">
		    {!! Form::label('user_name', 'Primary Contact name') !!}
		    {!! Form::text('user_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('user_name') }}</small>
		</div>

		<div class="form-group">
		    {!! Form::label('user_email', 'Primary Contact Email') !!}
		    {!! Form::email('user_email', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{!! $errors->first('user_email') !!}</small>
		</div>

		<div class="form-group">
			{!! Form::hidden('company_workspace_id', getenv('DEFAULT_WORKSPACE_ID')) !!}
			{!! Form::submit('Save', ['class' => 'btn btn-info pull-right']) !!}
		</div>

		{!! Form::close() !!}
	</div>
</div>
@stop
