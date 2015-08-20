@extends('layouts.default')

@section('content')
{{ var_dump([
	'company' => $company->toArray(),
	'users' => $company->users->toArray()
]) }}
@stop
