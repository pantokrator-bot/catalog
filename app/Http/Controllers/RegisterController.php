<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function save(Request $request){
		if(auth()->check()){
			return redirect(route('user.private'));
		}

		$validateFields = $request->validate([
			'email' => 'required|email',
			'name' => 'required',
			'surname' => 'required',
			'password' => 'required'
		]);

		if(User::where('email', $validateFields['email'])->exists()){
			return redirect()->to(route('user.registration'))->withErrors([
				'email' => 'Данный email занят'
			]);
		}

		$user = User::create($validateFields);
		if($user){
			Auth::login($user);
			return redirect()->to(route('user.private'));
		} 

		return redirect()->to(route('user.registration'))->withErrors([
			'formError' => 'Произошла ошибка при сохранении пользователя'
		]);
	 }
}
