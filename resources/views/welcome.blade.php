@extends('layouts.app')

@section('content')
<h1>Главная</h1>
<div class="row">
	<div class="col">
		<a href="/login" class="btn btn-primary">Вход</a>
	</div>
</div>
<div class="row mt-3">
	<div class="col">
		<a href="/registration" class="btn btn-primary">Регистрация</a>
	</div>
</div>
@endsection