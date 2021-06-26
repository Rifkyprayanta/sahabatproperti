<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan seluruh user ke dalam table data table pengguna
        $user = User::all();
        return view('user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menambahkan user kedalam database
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

        // membuat validator dengan library validator yang dimiliki oleh laravel 8 
        // use Illuminate\Support\Facades\Validator;
        $input = $request->all();

        // validator dengan input parameter request all, rules yang diberikan, serta pesan yang ingin ditampilkan
        // using Customizing The Error Messages laravel 8
        $validator = Validator::make($input, $rules, $messages);

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

        /// redirect jika sukses menyimpan data
        return redirect()->route('user.index')->with('success','Terimakasih, User Baru Berhasil Dibuat.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('user.edit', ['users' => $user]);
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
        //
        $rules = [
            'name' => 'required',
            'username' => 'required|min:8|max:20',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:13',
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
        ];

         // membuat validator dengan library validator yang dimiliki oleh laravel 8 
        // use Illuminate\Support\Facades\Validator;
        $input = $request->all();

        // validator dengan input parameter request all, rules yang diberikan, serta pesan yang ingin ditampilkan
        // using Customizing The Error Messages laravel 8
        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = strtolower($request->username);
        $user->email = strtolower($request->email);
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('user.index')->with('success','Terimakasih, User Baru Berhasil Diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        $user->delete();

        return redirect()->route('user.index')->with('success','Terimakasih, User Baru Berhasil Dihapus.');
    }
}
