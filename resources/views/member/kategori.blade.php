@extends('layouts.member')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <span>
            <a href="/tambah-kategori" class="btn btn-outline-light get-started-btn" style="border-radius: 5px; background: #3C6255">&nbsp;&nbsp; Tambah Data &nbsp;&nbsp;</a>
        </span><br><br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" border="0">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Kategori </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($kategori as $item)
                            <!-- Di sini, $item sudah didefinisikan -->
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $item->nama }} </td>
                                <td> 
                                   
                                    <form action="/hapus-kategori/{{ $item->id }}" method="POST">
                                         <a href="kategori/{{ $item->id }}/edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#BFD8AF" d="M6 2c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h4v-1.9l10-10V8l-6-6zm7 1.5L18.5 9H13zm7.1 9.5c-.1 0-.3.1-.4.2l-1 1l2.1 2.1l1-1c.2-.2.2-.6 0-.8l-1.3-1.3c-.1-.1-.2-.2-.4-.2m-2 1.8L12 20.9V23h2.1l6.1-6.1z"/></svg></a>
                                    &nbsp;
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"><path fill="#BFD8AF" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
