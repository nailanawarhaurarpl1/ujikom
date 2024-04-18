<!-- editkategori.blade.php -->

@extends('layouts.member')

@section('content')
    <div class="container">
        <h2>Edit Kategori</h2>
        <form action="/member/kategori/{{ $kategori->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->nama }}" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
