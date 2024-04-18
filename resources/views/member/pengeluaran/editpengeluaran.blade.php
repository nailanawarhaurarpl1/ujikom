<!-- editkategori.blade.php -->

@extends('layouts.member')

@section('content')
    <div class="container">
        <h2>Edit Pengeluaran</h2>
        <form action="/member/pengeluaran/{{ $pengeluaran->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kategori">Nama Kategori:</label>
                <select name="id_kategori" id="" placeholder="masukan kategori" class="form-control">
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $kat->id == $pengeluaran->id_kategori ? 'selected' : '' }}>{{ $kat->nama }}</option>
                    @endforeach
                </select>
            </div>
            
                <label for="nama">Nama Pengeluaran:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengeluaran->keterangan }}" >
            
            <div class="form-group mt-4">
                <label for="jumlah_pengeluaran">Jumlah Pengeluaran:</label>
                <input type="text" class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran" value="{{ $pengeluaran->jumlah_pengeluaran }}" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    
@endsection
