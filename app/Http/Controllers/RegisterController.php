<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function showRegister(){
        return view('register.index');
    }

    public function registerProcess(Request $request)
    {
        //membuat rules
        $rules = [
            'name' => 'required',
            'username' => 'required|min:8|max:20|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|max:13',
            'password' => 'required|confirmed'
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 8 karakter',
            'username.max' => 'Username maksimal 20 karakter',
            'usename.unique' => 'Username telah terdaftar',
            'email.required' => 'Email wajib diisi', 
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email telah terdaftar',
            'phone.required' => 'Nomor wajib diisi',
            'phone.min' => 'Nomor minimal 10 digit', 
            'phone.max' => 'Nomor maksimal 13 digit',
            'password.required' => 'Password wajib untuk diisi',
            'password.confirmed' => 'Password tidak sama'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->username = strtolower($request->username);
        $user->email = strtolower($request->email);
        $user->phone = strtolower($request->phone);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = Carbon::now();
        $user->level_id = 1;
        $simpan = $user->save();


        if($simpan) {
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('home');
        }
        else {
            Session::flash('errors', 'Register gagal! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('home');
        }
    }
}
