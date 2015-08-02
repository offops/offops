@extends('layouts.default')

@section('content')

<h1>{{ $company->name }}</h1>

@foreach ($company->users as $user)
<table>
	<tbody>
		<tr>
			<th>Email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{ $user->name }}</td>
		</tr>
	</tbody>
</table>
@endforeach

@stop

@section('tail')
<style>
	table { margin: 1em; }
	table th { text-align: right; }
	table th, table td { padding: 0.5ex; }
</style>
@stop