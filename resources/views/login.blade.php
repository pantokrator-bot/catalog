@extends('layouts/app')

@section('content')
<h1>Вход</h1>
<form action="{{ route('user.login') }}" method="POST">
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
			<input class="form-control" type="password" id="password" name="password" placeholder="пароль"><br>
			@error('password')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<button type="submit" class="btn btn-info">Вход</button>
</form>
<div class="row">
	<div class="col-1">
		<a href="/" class="nav-link">Главная</a>
	</div>
	<div class="col-1">
		<a href="/registration" class="nav-link">Регистрация</a>
	</div>
</div>
@endsection