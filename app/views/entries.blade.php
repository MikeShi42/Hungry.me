@extends('layout')

@section('head')
{{ HTML::style('css/style.css') }}
@stop

@section('content')
{{ $message or 'Enter a message.' }}<br>
{{ Form::open(array('url' => 'addEntry.php', 'method' => 'post')) }}
{{ Form::text('entry'); }}
{{ Form::close(); }}
Entries:
<ul>
@foreach($entries as $entry)
<li>{{ $entry->id }}: {{ $entry->entry }}</li>
@endforeach
</ul>

@stop