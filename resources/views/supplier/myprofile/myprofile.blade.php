@extends('layouts/app')
@section('content')
<div class="container">
	<h1>Мой профиль</h1>
	<div class="card mt-5" style="width: 30rem;">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">ID: {{$user->id}}</li>
			<li class="list-group-item">Name: {{$user->name}}</li>
			<li class="list-group-item">Surname: {{$user->surname}}</li>
			<li class="list-group-item">Email: {{$user->email}}</li>
		</ul>
	</div>
	<a href="/supplier" class="btn btn-info mt-3">Назад</a>
	<a href="{{ route('user.myprofile.edit', $user) }}" class="btn btn-warning mt-3">Изменить</a>
	
</div>

@endsection