@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">
					Register Company
				</div>
			</div>
			<div class="panel-body">
				{!! Form::open(['url' => action('CompaniesController@store'), 'class' => 'form-horizontal form-groups-bordered']) !!}
				<div class="form-group">
					<label for="company_name" class="col-sm-3 control-label">Company Name</label>
					<div class="col-sm-5">
						{!! Form::text('company[name]', null, ['placeholder' => 'Company Name', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					<label for="user_email" class="col-sm-3 control-label">Primary Contact Email</label>
					<div class="col-sm-5">
						{!! Form::email('user[email]', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					<label for="user[name]" class="col-sm-3 control-label">Primary Contact Name</label>
					<div class="col-sm-5">
						{!! Form::text('user[name]', null, ['placeholder' => 'Full Name', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5 col-sm-offset-3">
						{!! Form::hidden('workspace_id', getenv('DEFAULT_WORKSPACE_ID')) !!}
						{!! Form::submit('Save', ['class' => 'btn btn-default']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop