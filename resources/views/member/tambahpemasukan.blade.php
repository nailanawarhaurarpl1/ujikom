@extends('layouts.member')

@section('content')

</head>
<body>
    <form action="/member/pemasukan/post" method="post">
        @csrf
    <table border="0" width="500px">
       
        <tr>
            <td><br> Keterangan <br><br></td>
            <td>: <br></td>
            <td colspan="3"><input name="nama" type='text' class="form-control" placeholder="masukkan keterangan"/></td>
        </tr>
        <tr>
            <td>Jumlah <br></td>
            <td>: <br></td>
            <td colspan="3"><input name="jumlah_pemasukan" type='number' class="form-control" placeholder="masukkan jumlah uang"/></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right"><br><span>
                <button type="submit" class="btn btn-outline-light get-started-btn" style="border-radius: 5px; background: #3C6255">&nbsp;&nbsp; Tambah Data Kategori &nbsp;&nbsp;</button>
              </span></td>
        </tr>
    </table>
    </form>
                 
            
@endsection