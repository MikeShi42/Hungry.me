@extends('layouts.default')
@section('content')
    {{ Form::open(array('url' => 'foo/bar')) }}

    {{ Form::close() }}
@stop
