@extends('layouts.admins.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambahkan Pengguna</h6>
    </div>
    <div class="card-body">
    <form method="post" action="{{ route('category.update', $category->id ) }}">
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
            <label for="exampleFormControlInput1">Nama Kategori</label>
            <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}"  placeholder="Tips & Trik">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Deskripsi</label>
            <input type="text" class="form-control" name="description"  value="{{ $category->description }}" placeholder="Deskripsi">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>

@endsection('content')