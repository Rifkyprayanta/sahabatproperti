@extends('layouts.admins.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambahkan Informasi Berita</h6>
    </div>
    <div class="card-body">
    <form action="{{ route('information.store') }}" method="POST">
    @csrf
    @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ada yang Eror:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul Berita</label>
            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Tulis Judul Berita">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Deskripsi</label>
            <textarea class="form-control" name="description" id="exampleFormControlInput1" placeholder="Tulis Deskripsi Berita"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Input Gambar</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id" placeholder="Tulis Kategori Berita">
            @foreach ($category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Penulis</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->name }}" disabled>
            <input type="text" class="form-control" name="user_id" id="exampleFormControlInput1" value="{{ Auth::user()->name }}" hidden>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{ route('information.index') }}">Batal</a>
    </form>
    </div>
</div>

@endsection('content')