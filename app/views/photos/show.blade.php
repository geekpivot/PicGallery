@extends('layouts.master')

@section('content')

	<h1>{{$title}}</h1>
	{{ HTML::image('' . $imageurl . '')}}
	<p>{{$description}}</p>
	
@stop