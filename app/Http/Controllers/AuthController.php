<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Cabang;

class AuthController extends Controller
{
    public function signinview()
    {
        return view('index');
    }

    public function signin(request $request)
    {
        $credentcial = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($credentcial)) {
            return redirect('dashboard');
        }

        return redirect()->back()->withErrors(['email'=>'email atau password salah'])->onlyInput('email');
    }

    public function signupview(){
        $cabang = Cabang::all();
        return view('dashboard.pages.adduser')->with('cabang', $cabang);
    }


    public function signup(request $request)
    {
        $credentcial = $request->validate([
            'nama' => ['required','unique:users,nama'],
            'email' => ['required', 'email','unique:users,email'],
            'password' => 'required',
            'cabang_id' => ['required','numeric']
        ],
    [
        'nama.unique' => 'staff dengan nama ini sudah terdaftar',
        'email.unique' => 'staff dengan email ini sudah terdaftar',
    ]);

        User::create(array_merge($credentcial,['role'=>'staff']));
        
        return redirect()->back()->with("success","berhasil tambah staff");
    }

    public function signout(request $request)
    {
        Auth::logout();
        return redirect()->route('signin');
    }

    public function usershow(request $request){
        $user = User::get();

        return view('dashboard.pages.users')->with('user', $user);

    }
}
