@extends('layouts/app')

@section('content')
<h1>Регистрация</h1>
<form action="{{ route('user.registration') }}" method="POST">
	@csrf
	<div class="row">
		<div class="col-4">
			<input class="form-control" type="text" id="email" name="email" placeholder="email"><br>
			@error('email')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<input class="form-control" type="text" id="surname" name="surname" placeholder="фамилия"><br>
			@error('surname')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<input class="form-control" type="text" id="name" name="name" placeholder="имя"><br>
			@error('name')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<input class="form-control" type="password" id="password" name="password" placeholder="пароль"><br>
			@error('password')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<button class="btn btn-info" type="submit">Регистрация</button>
</form>
<div class="row">
	<div class="col-1">
		<a href="/" class="nav-link">Главная</a>
	</div>
	<div class="col-1">
		<a href="/login" class="nav-link">Вход</a>
	</div>
</div>
@endsection