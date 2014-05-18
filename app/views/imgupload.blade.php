<html>
<body>
{{ $message or '' }}
{{ Form::open(array('url' => 'upload', 'files' => 'true')) }}
<input name="image" type="file" capture="camera"><br>
{{ Form::submit('Upload!'); }}
{{ Form::close() }}
</body>
</html>