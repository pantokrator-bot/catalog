@extends('layouts/app')
@section('content')
<h1>Панель администратора</h1>
<ul class="nav">
  <li class="nav-item">
    <a class="btn btn-dark" href="admin/goods">Товары</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="admin/categories">Категории</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="admin/attributes">Атрибуты товаров</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="admin/goodsSuppliers">Товары поставщиков</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-dark" href="admin/users">Пользователи</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-warning" href="/logout">Выйти с учетной записи</a>
  </li>
</ul>
@endsection