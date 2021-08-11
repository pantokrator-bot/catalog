<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		$users = User::get();
		return view('/admin/users/index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/users/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		$validateFields = $request->validate([
			'email' => 'required|email',
			'name' => 'required',
			'surname' => 'required',
			'password' => 'required'
		]);

		if(User::where('email', $validateFields['email'])->exists()){
			return redirect()->to(route('user.users.create'))->withErrors([
				'email' => 'Данный email занят'
			]);
		}
		
		User::create($validateFields);
		return redirect()->route('user.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/users/show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		return view('/admin/users/form', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		$validateFields = $request->validate([
			'email' => 'required|email',
			'name' => 'required',
			'surname' => 'required',
			'password' => 'required',
			'status' => ''
		]);

		if(User::where('email', $validateFields['email'])->exists() && $user['email']!=$validateFields['email']){
			return redirect()->to(route('user.users.edit', $user))->withErrors([
				'email' => 'Данный email занят'
			]);
		}
		$user->update($validateFields);
		return redirect()->route('user.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		if (!Auth::check()) {
			return redirect('/');
		}
		if (Auth::user()['status'] != 'admin') {
			return redirect(route('user.private'));
		}
		$user->delete();
		return redirect()->route('user.users.index');

	}
}
