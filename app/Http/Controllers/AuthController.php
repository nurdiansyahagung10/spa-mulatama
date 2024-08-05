<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Cabang;
use Hash;

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
        if($request->password != $request->confirm_password){
            return redirect()->back()->withErrors('password dan confirm password tidak sama');
        }

        

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

        $credentcial['password'] = Hash::make($credentcial['password']);


        User::create(array_merge($credentcial,['role'=>'staff']));
        
        return redirect()->back()->with("success","berhasil tambah staff");
    }

    public function signout(request $request)
    {
        Auth::logout();
        return redirect()->route('signin');
    }

    public function edit(request $request, string $id){
        $cabang = Cabang::all();
        $user = User::with('cabang')->find($id);
        return view('dashboard.pages.edituser')->with(['user'=> $user, 'cabang' => $cabang]);

    }


    public function update(request $request,string $id){

        $credentcial = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'cabang_id' => ['required','numeric']
        ]);

        User::find($id)->update($credentcial);
        
        return redirect()->back()->with("success","berhasil edit staff ".$credentcial['nama']);

    }

    public function usershow(request $request){
        $user = User::get();

        return view('dashboard.pages.users')->with('user', $user);

    }

    public function userdelete(request $request, string $id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', "berhasil menghapus staff ". $user['nama']);
    }
}
