<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $password = $user->password;
        $password = preg_replace("/[\/\&%#\$a-zA-Z0-9+]/", "*", $password);
        $password = substr($password, 0, -50);
        return view('admin.users.show')->with(compact('user', 'password'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $newpassword = $request->input('newpassword');
        $confpassword = $request->input('password');
        $hconfpassword = password_hash($confpassword, PASSWORD_DEFAULT);
        $status = $request->input('status');
        if ($request->input('name') != NULL)
        {
            $user->name = $name;
            $user->username = $username;
            $user->email = $email;
            if ($newpassword)
            {
                if ($newpassword == $confpassword)
                    $user->password = $hconfpassword;
                else
                    return redirect(route('users.edit', $id))->with('flash_message_error', 'Password is not equal');
            }
            $user->admin = $status;
            $user->saveOrFail();
            return redirect(route('users.show', $id))->with('flash_message_success', 'User successfuly edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('users.index'))->with('flash_message_success', 'User deleted successfuly');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExport()
    {
       return view('admin.users.import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ImportUsers, request()->file('file'));
            
        return back();
    }
}
