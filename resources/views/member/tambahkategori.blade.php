@extends('layouts.member')

@section('content')

</head>
<body>
  

    <form action="/member/kategori/post" method="post">
        @csrf
        <table border="0" width="500px">
       
            <tr>
                <td><br> Kategori <br><br></td>
                <td>: <br></td>
                <td colspan="3"><input type='text' name="nama" class="form-control" vplaceholder="masukkan kategori" required/></td>
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