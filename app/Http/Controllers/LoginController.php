<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function proseslogin(Request $request)
    {

        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            // return redirect()->route('admin.index');
            return redirect()->route('admin.index');
        };

        return redirect()->route('login');
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function prosesregister(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2,
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }
}
