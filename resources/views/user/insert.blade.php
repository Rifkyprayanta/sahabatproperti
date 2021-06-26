@extends('layouts.admins.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambahkan Pengguna</h6>
    </div>
    <div class="card-body">
    <form action="{{ route('user.store') }}" method="POST">
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
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Siti Nur Hamidah">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="sitinur">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="sitinur@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone</label>
            <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="+62">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="*****">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="exampleFormControlInput1" placeholder="*****">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{ route('user.index') }}">Batal</a>
    </form>
    </div>
</div>

@endsection('content')