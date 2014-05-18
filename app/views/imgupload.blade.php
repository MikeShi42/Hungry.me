<html>
<body>
{{ $message or '' }}<br>
{{ Form::open(array('url' => 'upload', 'files' => 'true')) }}
{{ Form::file('image', array('capture' => 'camera')) }}<br>
Type of image:<br>
{{ Form::radio('type', 'restaurant') }}Restaurant
<ul>
<li>restaurants_id: {{ Form::text('restaurants_id') }}</li>
</ul>
{{ Form::radio('type', 'food') }}Food
<ul>
<li>food_instances_id: {{ Form::text('food_instances_id') }}</li>
</ul>
{{ Form::submit('Upload!') }}
{{ Form::close() }}
</body>
</html>