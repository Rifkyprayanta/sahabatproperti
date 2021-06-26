@extends('layouts.admins.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a type="button" class="btn btn-success" href="{{ route('category.create')}}">Tambah Kategori Informasi</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($category as $cat)
                    <tr>
                        <td>{{ $cat->category_name }}</td>
                        <td>{{ $cat->description }}</td>
                        <td>
                        <a type="button" class="btn btn-primary" href="{{ route('category.edit', $cat->id) }}">Edit</a> 
                        <form method="POST" action="{{ route('category.destroy', $cat->id ) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection('content')