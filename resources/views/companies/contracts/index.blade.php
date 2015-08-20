@extends('layouts.default')

@section('content')
{{ var_dump($company->toArray()) }}
{{ var_dump($company->contracts->toArray()) }}
@stop
