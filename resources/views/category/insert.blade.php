@extends('layouts.admins.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambahkan Kategori Informasi</h6>
    </div>
    <div class="card-body">
    <form action="{{ route('category.store') }}" method="POST">
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
            <label for="exampleFormControlInput1">Nama Role</label>
            <input type="text" class="form-control" name="category_name" id="exampleFormControlInput1" placeholder="Tips & Trik">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Deskripsi</label>
            <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Deskripsi Kategori">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{ route('category.index') }}">Batal</a>
    </form>
    </div>
</div>

@endsection('content')