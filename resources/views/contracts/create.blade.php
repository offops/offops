@extends(@$layout ?: 'layouts.default')

@section('content')

<div class="container">
	<div class="col-md-12">
		{!! Form::open([
			'method' => 'POST',
			'route'  => 'contracts.store',
			'class'  => 'form-horizontal'
		]) !!}

		<div class="form-group">
			{!! Form::label('company_id', 'Company') !!}
			{!! Form::select('company_id', $companies, null, ['class' => 'form-control', 'required' => 'required']) !!}
			<small class="text-danger">{{ $errors->first('company_id') }}</small>
		</div>	

		<div class="form-group">
			{!! Form::label('terms_and_conditions', 'Terms & Conditions') !!}
			{!! Form::textarea('terms_and_conditions', workspace()->textblock('terms_and_conditions'), ['class' => 'form-control', 'placeholder' => 'Terms & Conditions']) !!}
			<small class="text-danger">{{ $errors->first('terms_and_conditions') }}</small>
		</div>

		<div class="form-group">
			{!! Form::submit("Add", ['class' => 'btn btn-info pull-right']) !!}
		</div>

		{!! Form::close() !!}
	</div>
	<div class="col-md-12">
		@include('contracts.membership_details')
	</div>
</div>

@stop
