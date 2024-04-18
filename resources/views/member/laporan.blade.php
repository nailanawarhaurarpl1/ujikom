@extends('layouts.member')

@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/datedropper.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/datedropper.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

            html,
            body {
                height: 100%
            }

            body {
    display: block; /* Ubah dari display: grid; ke display: block; */
    background: #F44336;
    font-family: 'Manrope', sans-serif;
    overflow-y: auto; /* Menambahkan overflow-y: auto; untuk mengizinkan scroll vertikal jika konten melebihi ukuran layar */
}


            .mt-100 {
                margin-top: 100px
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                padding: 20px;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border-radius: 6px;
                -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
            }

            .form-control[readonly] {
                background-color: #f44336;
                opacity: 1;
                color: #fff;
                border: 1px solid #f44336
            }

            .pro-button {
                background-color: #f44336;
                border-color: #f44336
            }

            .pro-button:focus {
                outline: none !important;
                background-color: #f44336;
                border-color: #f44336;
                box-shadow: 0 0 0 0.2rem rgb(255, 255, 255) !important
            }

            .pro-button:active {
                outline: none !important;
                background-color: #f44336 !important;
                border-color: #f44336 !important
            }

            .pro-button:hover {
                background-color: #d8271a;
                border-color: #d8271a
            }

            label {
                font-weight: 800
            }
            .bold-text {
        font-weight: bold;
    }
        </style>
    </head>
    <div class="row">
        <div class="col-12 grid-margin">
            <form action="{{ route('filter') }}" method="post">
                @csrf
                <div class="container mt-0">
                    <div class="row">
                        <div class="col-md-4">
                            <label>
                                <p style="color: black"> Dari</p>
                            </label>
                            <input style="background-color: #337357" type="date" class="form-control" name="start_date" value="{{ request()->input('start_date') }}">
                        </div>
                        <div class="col-md-4">
                            <label>
                                <p style="color: black"> Sampai</p>
                            </label>
                            <input style="background-color: #337357" type="date" class="form-control" name="end_date" value="{{ request()->input('end_date') }}">
                        </div>
                        <div class="col-md-4">
                            <label>Search</label>
                            <button type="submit" class="btn btn-warning pro-button w-100 h-9" style="background-color: #FAA300">Tampilkan <i
                                    class="fa fa-plane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
<br>     
<div class="card" style="background-color: #FFC94A">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><p style="color: black"><b> No </b></p></th>
                        <th><p style="color: black"><b> Tanggal </b></p></th>
                        <th><p style="color: black"><b> Keterangan </b></p></th>
                        <th><p style="color: black"><b> Pemasukan </b></p></th>
                        <th><p style="color: black"><b> Pengeluaran </b></p></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $totalPemasukan = 0;
                        $totalPengeluaran = 0;
                    @endphp
                    @foreach($groupedData as $tanggal => $items)
                        @foreach($items as $item)
                            <tr>
                                <td><p style="color: black; font-size: "><b>{{ $no++ }}</b></p></td>
                                <td><p style="color: black; font-size: "><b>{{ $tanggal }}</b></p></td>
                                <td><p style="color: black; font-size: "><b>{{ $item['data']->nama }}</b></p><p style="color: black; font-size: "><b>
                                    @php
                                        if ($item['type'] == 'Pengeluaran') {
                                            echo $item['data']->keterangan;
                                        }
                                    @endphp
                                </b></p></td>
                                <td>
                                    <p style="color: black; font-size: "><b>
                                        @php
                                            if ($item['type'] == 'Pemasukan') {
                                                $totalPemasukan += $item['data']->jumlah_pemasukan;
                                                echo $item['data']->jumlah_pemasukan;
                                            }
                                        @endphp
                                    </b></p>
                                </td>
                                <td>
                                    <p style="color: black; font-size: "><b>
                                        @php
                                            if ($item['type'] == 'Pengeluaran') {
                                                $totalPengeluaran += $item['data']->jumlah_pengeluaran;
                                                echo $item['data']->jumlah_pengeluaran;
                                            }
                                        @endphp
                                    </b></p>
                                </td>
                                
                            </tr>
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <td><p style="color: blue; font-size:;"><b>TOTAL</b></p></td>
                        <td><p style="color: blue; font-size:;"><span class="bold-text">{{ $totalPemasukan }}</span></p></td>
                        <td><p style="color: blue; font-size:;"><span class="bold-text">{{ $totalPengeluaran }}</span></p></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script>
        var datauser = Cookies.get('userData');
        if (datauser) {
            var userDataObject = JSON.parse(datauser);
            if (userDataObject.roles != 'member') {
                window.location = '/login';
            }
        } else {
            window.location = '/login';
        }
    </script>

    <script>
        $(document).ready(function() {
            $('input').dateDropper();
        });
    </script>
@endsection
