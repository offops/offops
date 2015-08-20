@extends('layouts.default')

@section('content')
<ul>
	@foreach ($contracts as $contract)
	<li>
		{!! link_to_route('contracts.show', $contract->company->name, $contract->token) !!}
	</li>
	@endforeach
</ul>
@stop