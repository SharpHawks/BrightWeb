<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
	      if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'), 'admin' => 1])) {
	          // Authentication passed...
	      		Session::put('admin', 1);
	          return redirect(route('adminHome'));
	      }
	    }
    	return view('admin.auth.login');
    }
}
