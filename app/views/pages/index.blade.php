@extends('layouts.default')
@section('content')

    {{ Form::open(array('url' => '/search')) }}
     {{  Form::text('searchString', 'Sushi')}}
{{Form::select('searchBy', array('I' => 'Item', 'R' => 'Restaurant'), 'I');}}
{{ Form::submit('Search Now')}}

    {{ Form::close() }}
@stop
