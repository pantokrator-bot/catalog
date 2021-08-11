<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		if (Auth::check()) {
			return redirect()->intended(route('user.private'));
		}
		$user = User::where('email', $request->email)
			->where('password', $request->password)
			->first();
		if ($user) {
			Auth::loginUsingId($user->id);
			// -- OR -- //
			Auth::login($user);
			return redirect()->route('user.private');
		}

		return redirect(route('user.login'))->withErrors([
			'email' => 'Не удалось авторизоваться'
		]);
	}
}
