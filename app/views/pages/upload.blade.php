@extends('layouts.master')

@section('content')
	<div>
		{{ Form::open(array('route'=>'photo.store','files' => true)) }}
  
  		{{ Form::label('file','File',array('id'=>'','class'=>'')) }}
  		{{ Form::file('file','',array('id'=>'','class'=>'')) }}
  <br/>
  <!-- submit buttons -->
  		{{ Form::submit('Save') }}
  
 <!-- reset buttons -->
  		{{ Form::reset('Reset') }}
 
 	{{ Form::close() }}
	</div>
@stop