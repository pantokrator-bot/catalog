<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		$user = Auth::user();
		return view('/supplier/myprofile/myprofile', compact('user'));
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		$user = Auth::user();
		return view('supplier/myprofile/form', compact('user'));
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
		$validateFields = $request->validate([
			'email' => 'required|email',
			'name' => 'required',
			'surname' => 'required',
			'password' => 'required'
		]);
		$user = Auth::user();
		if(User::where('email', $validateFields['email'])->exists() && $user['email']!=$validateFields['email']){
			return redirect()->to(route('user.myprofile.edit', $user))->withErrors([
				'email' => 'Данный email занят'
			]);
		}
		$user->update($request->only(['name', 'surname', 'email', 'password']));
		return redirect()->route('user.myprofile.index');
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
		if (Auth::user()['status'] != 'supplier') {
			return redirect(route('user.private'));
		}
	}
}
