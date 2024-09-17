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

        if (Auth::attempt($credentcial) && $accessToken = Auth::guard('api')->attempt($credentcial)) {
            session(['access_token' => $accessToken]);

            return redirect('dashboard');
        }

        return redirect()->back()->withErrors(['email'=>'email atau password salah'])->onlyInput('email');
    }

    public function refresh(Request $request)
    {
            $newToken = Auth::guard('api')->refresh();

            session(['access_token' => $newToken]);
            return response()->json(['message' => 'succses refresh token'], 202);
    }

    public function signupview(){
        $cabang = Cabang::all();
        return view('dashboard.pages.staff.adduser')->with('cabang', $cabang);
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
        'nama.unique' => 'staff dengan nama '. $request->nama .' sudah terdaftar',
        'email.unique' => 'staff dengan email '. $request->email .' sudah terdaftar',
]);

        $credentcial['password'] = Hash::make($credentcial['password']);


        User::create(array_merge($credentcial,['role'=>'staff']));

        return redirect()->back()->with("success","berhasil tambah staff ". $credentcial['nama']);
    }

    public function signout(request $request)
    {
        Auth::logout();

        try{
            Auth::guard('api')->setToken(session('access_token'))->logout();
            $request->session()->forget('access_token');
            return redirect()->route('signin');

        }catch(\Exception $e){
            $request->session()->forget('access_token');
            return redirect()->route('signin');
        }

    }

    public function edit(request $request, string $id){
        $cabang = Cabang::all();
        $user = User::with('cabang')->find($id);
        return view('dashboard.pages.staff.edituser')->with(['user'=> $user, 'cabang' => $cabang]);

    }


    public function update(request $request,string $id){

        $user = User::find($id);

        if($user->nama == $request->nama && $user->email == $request->email){
            $credentcial = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'cabang_id' => ['required','numeric']
            ]);
        }else if($user->nama != $request->nama){
            $credentcial = $request->validate([
                'nama' => ['required','unique:users,nama'],
                'email' => 'required',
                'cabang_id' => ['required','numeric']
            ],
            [
                'nama.unique' => 'staff dengan nama '. $request->nama .' sudah terdaftar',
            ]);
        }else if($user->email != $request->email){
            $credentcial = $request->validate([
                'nama' => 'required',
                'email' => ['required','unique:users,email'],
                'cabang_id' => ['required','numeric']
            ],
            [
                'email.unique' => 'staff dengan email '. $request->email .' sudah terdaftar',
            ]);

        }else{
            $credentcial = $request->validate([
                'nama' => ['required','unique:users,nama'],
                'email' => ['required','unique:users,email'],
                'cabang_id' => ['required','numeric']
            ],
            [
                'nama.unique' => 'staff dengan nama '. $request->nama .' sudah terdaftar',
                'email.unique' => 'staff dengan email '. $request->email .' sudah terdaftar',
            ]);
        }

        User::find($id)->update($credentcial);

        return redirect()->back()->with("success","berhasil edit staff ".$user['nama']);

    }

    public function usershow(request $request){
        $user = Auth::user();
        $getusername = $user->nama;
        $cabang = null;
        if(isset($user->cabang)){
            $cabang = $user->cabang->nama;
        }
        return view("dashboard.pages.staff.users")->with(['getusername' => $getusername, 'cabang' => $cabang]);

    }

    public function userdelete(request $request, string $id){
        $user = User::find($id);
        if($user->role  == 'admin'){
            return redirect()->back()->withErrors('tidak bisa menghapus akun utama');
        }
        $user->delete();

        return redirect()->back()->with('success', "berhasil menghapus staff ". $user['nama']);
    }
}
