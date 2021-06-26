<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login.index');
    }

    public function loginProcess(Request $request)
    {
        // membuat rules
        $rules = [
            'username' => 'required|min:8|max:40',
            'password' => 'required|min:8|max:12',
        ];

        //membuat sebuah message validation
        $message = [
            'username.required' => 'username wajib untuk diisi',
            'username.min' => 'username minimal 12 huruf', 
            'username.max' => 'username maksimal 40 huruf', 
            'password.required' => 'password wajib untuk diisi',
            'password.min' => 'password minimal 8 karakter', 
            'password.max' => 'password maksimal 12 karakter', 
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'username'     => $request->input('username'),
            'password'     => $request->input('password'),
        ];

        Auth::attempt($data);

        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        else {
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('home');
    }
}
