<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function formlogin()
    {
        return view('admin.login');
    }

    public function login(request $request)
    {
        $username = petugas::where('username', $request->username)->first();

        if(!$username){
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar!']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password){
            return redirect()->back()->with(['pesan'=> 'password tidak sesuai!']);
        }

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }else{
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.formlogin');
    }
}
