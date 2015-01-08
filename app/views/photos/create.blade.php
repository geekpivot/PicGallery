@extends('layouts.master')

@section('content')
	<div>
		{{ Form::open(array('action' => 'PhotosController@store','files' => true)) }}
  
  		{{ Form::label('file','File',array('id'=>'','class'=>'')) }}
  		{{ Form::file('file','',array('id'=>'','class'=>'')) }}
  <br/>
		<div class="form-group">
  			{{ Form::label('title', 'Title: ')}}
			{{ Form::text('title', '', [ 'class' => 'form-control'])}}
  		</div>

  		<div class="form-group">
  			{{ Form::label('desciption', 'Description: ')}}
			{{ Form::textarea('description', '', [ 'class' => 'form-control'])}}
  		</div>
  <!-- submit buttons -->
  		{{ Form::submit('Save') }}
  
 <!-- reset buttons -->
  		{{ Form::reset('Reset') }}
 
 	{{ Form::close() }}
	</div>
@stop