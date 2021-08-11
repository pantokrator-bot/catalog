@extends('layouts/app')
@section('content')
<div class="container">
	<h1>Изменения данных профиля</h1>
	<form method="POST" action="{{ route('user.myprofile.update', $user) }}">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{$user->name}}" type="text" name="name" class="form-control" placeholder="Name">
			</div>
			@error('name')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{$user->surname}}" type="text" name="surname" class="form-control" placeholder="Surname">
			</div>
			@error('surname')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{$user->email}}" type="text" name="email" class="form-control" placeholder="Email">
			</div>
			@error('email')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{$user->password}}" type="password" name="password" class="form-control" placeholder="Password">
			</div>
			@error('password')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<button class="btn btn-success mt-3" type="submit">Изменить</button>
		<a href="{{ route('user.myprofile.index')}}" class="btn btn-info mt-3">Назад</a>
	</form>
</div>
@endsection