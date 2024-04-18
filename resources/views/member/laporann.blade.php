@extends('layouts.member')

@section('content')

<div class="row">
    <div class="col-12 grid-margin">
        
        <div class="card" style=" background-color: #E1F0DA">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" border="0">
                        <thead>
                            <tr >
                                <th><p style="color: #114232; font-size: 17px"><b> No </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Pemasukan </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Pengeluaran </b></p></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $totalPemasukan = 0;
                                $totalPengeluaran = 0;
                            @endphp

                            <!-- Loop through each pemasukan -->
                            @foreach($pemasukan as $item)
                                <tr>
                                    <td> <p style="color: black; font-size: "><b>{{ $no++ }}</b></p></td>
                                    <td> <p style="color: black; font-size: "><b>{{ $item->jumlah_pemasukan }}</b></p></td>
                                    <td> <p style="color: black; font-size: "><b></b></p></td>
                                </tr>
                                <!-- Hitung total pemasukan -->
                                @php
                                    $totalPemasukan += $item->jumlah_pemasukan;
                                @endphp
                            @endforeach

                            <!-- Loop through each pengeluaran -->
                            @foreach($pengeluaran as $item)
                                <tr>
                                    <td> <p style="color: black; font-size: "><b>{{ $no++ }}</b></p></td>
                                    <td> <p style="color: black; font-size: "><b></b></p></td>
                                    <td> <p style="color: black; font-size: "><b>{{ $item->jumlah_pengeluaran }}</b></p></td>
                                </tr>
                                <!-- Hitung total pengeluaran -->
                                @php
                                    $totalPengeluaran += $item->jumlah_pengeluaran;
                                @endphp
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td>Total Pemasukan: <b>{{ $totalPemasukan }}</b></td>
                                <td>Total Pengeluaran: <b>{{ $totalPengeluaran }}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
