<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::name('user.')->group(function () {


	Route::get('/login', function () {
		if (Auth::check()) {
			return redirect(route('user.private'));
		}
		return view('login');
	})->name('login');

	Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

	Route::get('/logout', function () {
		Auth::logout();
		return redirect('/');
	})->name('logout');

	Route::get('/registration', function () {
		if (Auth::check()) {
			return redirect(route('user.private'));
		}
		return view('registration');
	})->name('registration');

	Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);

	Route::get('/private', [\App\Http\Controllers\PrivateController::class, 'checkStatus'])->middleware('auth')->name('private');

	Route::get('/admin', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('admin/admin');
	})->name('admin');


	Route::get('/admin/goods', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/goods');
	});


	Route::get('/admin/categories', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/categories');
	});


	Route::get('/admin/attributes', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/attributes');
	});


	Route::get('/admin/goodsSuppliers', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/goodsSuppliers');
	});


	Route::resource('/admin/users', \App\Http\Controllers\UsersController::class);


	Route::get('/supplier', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		return view('supplier/supplier');
	})->name('supplier');


	Route::resource('/supplier/myprofile', \App\Http\Controllers\ProfileController::class);


	Route::get('/supplier/allgoods', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		return view('/supplier/allgoods');
	});


	Route::get('/supplier/mygoods', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		return view('/supplier/mygoods/mygoods');
	});


	Route::get('/supplier/addgood', function () {
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		return view('/supplier/addgood');
	});


});
