@extends('layouts/app')
@section('content')
<div class="container">
	<h1>{{ isset($user) ? 'Изменение пользователя, '.$user->name.' '.$user->surname : 'Создание пользователя'}}</h1>
	<form method="POST" @if(isset($user))   action="{{ route('user.users.update', $user) }}"     @else  action="{{ route('user.users.store') }}" @endif>
		@csrf
		@isset($user)
			@method('PUT')
		@endisset
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{ isset($user) ? $user->name : null}}" type="text" name="name" class="form-control" placeholder="Name">
			</div>
			@error('name')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{ isset($user) ? $user->surname : null}}" type="text" name="surname" class="form-control" placeholder="Surname">
			</div>
			@error('surname')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{ isset($user) ? $user->email : null}}" type="text" name="email" class="form-control" placeholder="Email">
			</div>
			@error('email')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row">
			<div class="col-4 mt-3">
				<input value="{{ isset($user) ? $user->password : null}}" type="password" name="password" class="form-control" placeholder="Password">
			</div>
			@error('password')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<div class="row radios">
			<div class="col-4 mt-3">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="status" value="customer">
					<label class="form-check-label" for="inlineRadio1">Покупатель</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="status" value="supplier">
					<label class="form-check-label" for="inlineRadio2">Поставщик</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="status" value="admin">
					<label class="form-check-label" for="inlineRadio2">Администратор</label>
				</div>
			</div>
			@error('status')
			<div class="alert alert-danger col-3">{{ $message }}</div>
			@enderror
		</div>
		<button class="btn btn-success mt-3" type="submit">{{ isset($user) ? 'Изменить' : 'Создать'}}</button>
		<a href="{{ route('user.users.index')}}" class="btn btn-info mt-3">Назад</a>
	</form>
</div>
<style>
.radios{
	display: {{ isset($user) ? 'block' : 'none'}};
}
</style>
@endsection