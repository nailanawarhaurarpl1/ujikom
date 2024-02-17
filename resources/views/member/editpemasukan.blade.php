<!-- editkategori.blade.php -->

@extends('layouts.member')

@section('content')
    <div class="container">
        <h2>Edit Pemasukan</h2>
        <form action="/pemasukan/{{ $pemasukan->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Pemasukan:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $pemasukan->nama }}" >
            </div>
            <div class="form-group">
                <label for="jumlah_pemasukan">Jumlah Pemasukan:</label>
                <input type="text" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan" value="{{ $pemasukan->jumlah_pemasukan }}" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
