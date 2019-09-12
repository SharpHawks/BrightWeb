<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createUser()
    {
        $var = new User([
            'name' => 'asdasdasdasdasd',
            'username' => 'asdasdasdasdasd',
            'email' => 'lalala@lalala.lv',
            // 'email_verified_at' => $row[4],
            'password' => '$2y$10$2XylOXcCwCSsiDJ7n2siE.mnLz395.s2KR2OCLdbxzF.gSrLMqGDm',
            // 'remember_token' => $row[6],
            // 'admin' => $row[7],
            // 'created_at' => $row[8],
            // 'updated_at' => $row[9]
        ]);
        $var->saveOrFail();
    }
}
