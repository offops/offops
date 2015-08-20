@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Added</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($companies as $company)
				<tr>
					<td>
						{!! HTML::link(route('companies.show', $company->id), $company->name) !!}
					</td>
					<td>
						{{ $company->created_at->toDayDateTimeString() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="row text-center">
	{!! $paginator->render() !!}
</div>
@stop