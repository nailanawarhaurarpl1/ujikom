@extends('layouts.member')

@section('content')

</head>
<body>
    <form action="/member/pengeluaran/post" method="post">
        @csrf
    <table border="0" width="500px">
        <tr>
            <td><br> Kategori <br><br></td>
            <td>: <br></td>
            <td colspan="3">
                <select name="id_kategori" class="form-control" placeholder="masukkan kategori">
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                    @endforeach
                </select>
                
            </td>
        </tr>
        <tr>
            <td><br> Keterangan <br><br></td>
            <td>: <br></td>
            <td colspan="3"><input name="keterangan" type='text' class="form-control" placeholder="masukkan keterangan"/></td>
        </tr>
        <tr>
            <td>Jumlah <br></td>
            <td>: <br></td>
            <td colspan="3"><input name="jumlah_pengeluaran" type='number' class="form-control" placeholder="masukkan jumlah uang"/></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right"><br><span>
                <button type="submit" class="btn btn-outline-light get-started-btn" style="border-radius: 5px; background: #3C6255">&nbsp;&nbsp; Tambah Data Pengeluaran &nbsp;&nbsp;</button>
              </span></td>
        </tr>
    </table>
    </form>
                 
            
@endsection