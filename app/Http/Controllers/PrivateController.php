<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrivateController extends Controller
{
	public function checkStatus()
	{
		if(Auth::user()['status'] == 'admin'){
			return redirect( route('user.admin') );
		}
		if(Auth::user()['status'] == 'supplier'){
			return redirect( route('user.supplier'));
		}
		return Auth::user()['status'];
	}
}
