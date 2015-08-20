{{-- contracts.membership_details --}}
{!! Form::open([
	'method' => 'POST',
	// 'route' => 'contracts.memberships.store',
	'class' => 'form-horizontal'
]) !!}

<div class="form-group">
    {!! Form::label('item_type', 'Type') !!}
    {!! Form::select(
    	'item_type',
    	[
	    	'monthly' => 'Monthly',
	    	'one_time' => 'One-Time',
	    	'security' => 'Security',
	    	'pro_rated' => 'Pro-Rated',
	    ],
    	null,
    	['class' => 'form-control', 'required' => 'required']
    ) !!}
    <small class="text-danger">{{ $errors->first('item_type') }}</small>
</div>

<div class="form-group">
    {!! Form::label('date_range', 'Date Range') !!}
    {!! Form::text('date_range', null, ['class' => 'form-control daterange', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('date_range') }}</small>
</div>

<div class="form-group">
    {!! Form::label('item_name', 'Item Name') !!}
    {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('item_name') }}</small>
</div>

<div class="form-group">
    {!! Form::label('item_amount', 'Item Amount') !!}
    {!! Form::input('number', 'item_amount', null, ['class' => 'form-control', 'step' => '0.01']) !!}
    <small class="text-danger">{{ $errors->first('item_amount') }}</small>
</div>

{!! Form::close() !!}


@section('scripts')
<script src="/assets/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
<script src="/assets/js/daterangepicker/moment.min.js"></script>
<script src="/assets/js/daterangepicker/daterangepicker.js"></script>
@stop


@section('styles')
<link rel="stylesheet" href="/assets/js/daterangepicker/daterangepicker-bs3.css">
@stop
