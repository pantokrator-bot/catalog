@extends('layouts/app')
@section('content')
<h1>Панель поставщика</h1>
<ul class="nav">
  <li class="nav-item">
    <a class="btn btn-dark" href="supplier/myprofile">Мой профиль</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="supplier/allgoods">Все товары</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="supplier/mygoods">Мои товары</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="supplier/addgood">Добавить товар</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-warning" href="/logout">Выйти с учетной записи</a>
  </li>
</ul>
@endsection