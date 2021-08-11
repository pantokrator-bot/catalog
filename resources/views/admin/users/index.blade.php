@extends('layouts/app')
@section('content')
<div class="container">
	<h1 class="mt-2">Пользователи</h1>
	<a href="/admin" class="btn btn-secondary mt-2">Панель администратора</a>
	<a href="{{ route('user.users.create') }}" class="btn btn-info mt-2">Создать</a>
	<table class="table mt-5">
		<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">Name</th>
				<th scope="col">Surname</th>
				<th scope="col">Email</th>
				<th scope="col">Status</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<th scope="row">{{ $user->id}}</th>
				<td>
					<a href="{{ route('user.users.show', $user) }}">{{ $user->name }}</a>
				</td>
				<td>
					<a href="{{ route('user.users.show', $user) }}">{{ $user->surname }}</a>
				</td>
				<td>
					<a href="{{ route('user.users.show', $user) }}">{{ $user->email }}</a>
				</td>
				<td>
					<a href="{{ route('user.users.show', $user) }}">{{ $user->status }}</a>
				</td>
				<td>
					<div class="row">
						<div class="col-3">
							<a href="{{ route('user.users.edit', $user) }}" class="btn btn-warning">Изменить</a>
						</div>
						<div class="col-3">
							<form action="{{ route('user.users.destroy', $user)}}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger">Удалить</button>
							</form>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection