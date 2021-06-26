<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = Role::all();
        return view('roles.index', ['roles' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'role_name' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'role_name.required' => 'Nama Role Wajib diisi',
            'description.required' => 'Description Role Wajib diisi'
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

        $role = new Role;
        $role->role_name = ucwords(strtolower($request->role_name));
        $role->description = $request->description;
        $simpan = $role->save();

        /// redirect jika sukses menyimpan data
        return redirect()->route('role.index')->with('success','Terimakasih, Role Baru Telah Berhasil dibuat.');
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
        $role = Role::findOrFail($id);
        return view('roles.edit', ['roles' => $role]);
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
            'role_name' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'role_name.required' => 'Nama Role Wajib Untuk Diisi',
            'description.required' => 'Decription Role Wajib Untuk Diisi',
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

        $role = Role::find($id);
        $role->role_name = ucwords(strtolower($request->role_name));
        $role->description = $request->description;
        $simpan = $role->save();

        return redirect()->route('role.index')->with('success','Terimakasih, Role Behasil Diperbarui.');
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
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('role.index')->with('success','Terimakasih, Role Telah Berhasil Dihapus.');
    }
}
