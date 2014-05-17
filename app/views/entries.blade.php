@extends('layout')

@section('content')
Entries:
<ul>
@foreach($entries as $entry)
<li>{{ $entry->id }}: {{ $entry->entry }}</li>
@endforeach
</ul>

@stop