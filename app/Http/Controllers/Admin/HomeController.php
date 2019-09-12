<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class HomeController extends Controller
{
    
		public function index()
		{
			return view('admin.home.index');
		}

		public function logout()
		{
			Session::forget('admin');
			return redirect(route('adminLogin'));
		}

}
