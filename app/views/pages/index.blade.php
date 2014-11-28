<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	{{ Form::open(array('route'=>'photo.store','files' => true)) }}
  
  		{{ Form::label('file','File',array('id'=>'','class'=>'')) }}
  		{{ Form::file('file','',array('id'=>'','class'=>'')) }}
  <br/>
  <!-- submit buttons -->
  		{{ Form::submit('Save') }}
  
  <!-- reset buttons -->
  		{{ Form::reset('Reset') }}
  
  	{{ Form::close() }}
</body>
</html>