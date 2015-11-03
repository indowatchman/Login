@extends('master')

@section('content')
<div class="col-md-4">
 
</div>
<div class="col-md-4">
	<br><br><br><br><br>
	{!! Form::open(['route' => 'login']) !!}
	<div class="form-group"> 
	 	@if(Session::has('pesan_error'))
	 		<div class="alert alert-danger">{{ Session::get('pesan_error') }}</div>
	 	@endif
	</div>
	<div class="form-group"> 
	 {!! Form::label('email', 'Email..') !!}
	 <input type="email" name="email" required placeholder="E-mail" class="form-control">
	 <!-- {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!} -->
	</div>
	<div class="form-group"> 
	 {!! Form::label('password', 'Password..') !!}
	 {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
	</div>
	<div class="form-group"> 
	 {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
	</div>
	{!! Form::close() !!}
	<a href="{{ route('register') }}"><input type="submit" value="Register" class="btn btn-danger"></a>
	</div>
 </div>
@stop