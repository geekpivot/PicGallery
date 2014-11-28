@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-4 well">

				<h2>Login</h2>
				{{ Form::open()}}
					<div class="form-group">
						
						{{ Form::label('email', 'Email: ')}}
						{{ Form::email('email', '', [ 'class' => 'form-control'])}}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password: ')}}
						{{ Form::password('password', [ 'class' => 'form-control'])}}
					</div>

					<div class="form-group">
						{{ Form::submit('Register', [ 'class' => 'btn btn-success'])}}
					</div>
				{{ Form::close()}}
			</div>
			<div class="col-sm-4 col-sm-offset-2 well">
				<h2>Register</h2>
				{{ Form::open()}}
					<div class="form-group">
						{{ Form::label('first_name', 'First Name: ')}}
						{{ Form::text('first_name', '' , [ 'class' => 'form-control'])}}
					</div>
					<div class="form-group">
						{{ Form::label('last_name', 'Last Name: ')}}
						{{ Form::text('last_name', '', [ 'class' => 'form-control'])}}
					</div>

					<div class="form-group">
						
						{{ Form::label('email', 'Email: ')}}
						{{ Form::email('email', '', [ 'class' => 'form-control'])}}
					</div>

					<div class="form-group">
						{{ Form::label('password', 'Password: ')}}
						{{ Form::password('password', [ 'class' => 'form-control'])}}
					</div>

						
					
					<div class="form-group">
						{{ Form::submit('Register', [ 'class' => 'btn btn-success'])}}
					</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
@stop