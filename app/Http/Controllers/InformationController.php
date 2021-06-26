<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\Information;
use App\Models\Category;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $information = Information::with('category')->get();
        return view('information.index', ['information' => $information]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('information.insert', ['category' => $category]);
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Wajib Diisi',
            'description.required' => 'Deskripsi Wajib diisi',
            'image.required' => 'Harus menyertakan gambar',
            'user_id.required' => 'Harus ada penulis',
            'category_id.required' => 'Harus ada kategori berita yang dipilih'
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

        $information = new Information;
        $information->title = $request->title;
        $information->description = $request->description;
        $information->image = $request->image;
        $information->user_id = Auth::user()->id;
        $information->category_id = $request->category_id;
        $simpan = $information->save();

        /// redirect jika sukses menyimpan data
        return redirect()->route('information.index')->with('success','Terimakasih, Informasi Telah Berhasil dibuat.');
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
        $information = Information::with('category')->findOrFail($id);
        $category = Category::all();
        return view('information.edit', ['information' => $information, 'category' => $category]);
        
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Wajib Diisi',
            'description.required' => 'Deskripsi Wajib diisi',
            'image.required' => 'Harus menyertakan gambar',
            'user_id.required' => 'Harus ada penulis',
            'category_id.required' => 'Harus ada kategori berita yang dipilih'
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

        $information = Information::find($id);
        $information->title = $request->title;
        $information->description = $request->description;
        $information->image = $request->image;
        $information->user_id = Auth::user()->id;
        $information->category_id = $request->category_id;
        $simpan = $information->save();

        return redirect()->route('information.index')->with('success','Terimakasih, Informasi Behasil Diperbarui.');
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
        $information = Information::find($id);
        $information->delete();

        return redirect()->route('information.index')->with('success','Terimakasih, Informasi Telah Berhasil Dihapus.');
    }
}
