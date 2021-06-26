<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        return view('category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.insert');
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
            'category_name' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'category_name.required' => 'Nama Kategori Wajib Diisi',
            'description.required' => 'Description Wajib diisi'
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

        $category = new Category;
        $category->category_name = ucwords(strtolower($request->category_name));
        $category->description = $request->description;
        $simpan = $category->save();

        /// redirect jika sukses menyimpan data
        return redirect()->route('category.index')->with('success','Terimakasih, Kategori Informasi Telah Berhasil dibuat.');
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
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
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
            'category_name' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'category_name.required' => 'Nama Kategori Wajib Untuk Diisi',
            'description.required' => 'Decription Wajib Untuk Diisi',
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

        $category = Category::find($id);
        $category->category_name = ucwords(strtolower($request->category_name));
        $category->description = $request->description;
        $simpan = $category->save();

        return redirect()->route('category.index')->with('success','Terimakasih, Kategori Informasi Behasil Diperbarui.');
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
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index')->with('success','Terimakasih, Kategori Informasi Telah Berhasil Dihapus.');
    }
}
