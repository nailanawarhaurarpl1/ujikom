@extends('layouts.member')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
      <div class="row">
        <div class="col" style="margin-right: -315px;">Pilih Tanggal</div>
        <div class="col">
            <div id="date-picker-start" class="md-form md-outline input-with-post-icon datepicker" inline="true">
              <input placeholder="Select date" type="date" id="start_date" class="form-control">
                <i class="fas fa-calendar input-prefix"></i>
            </div>
        </div>
        <div class="col" style="margin-right: -350px;">Sampai</div>
        <div class="col">
            <div id="date-picker-end" class="md-form md-outline input-with-post-icon datepicker" inline="true">
              <input placeholder="Select date" type="date" id="end_date" class="form-control">
                <i class="fas fa-calendar input-prefix"></i>
            </div>
        </div>
        <div class="col" style="margin-right: -320px;">
          <button type="button" id="filter_button" class="btn btn-outline-info btn-rounded" data-mdb-ripple-init data-mdb-ripple-color="dark">Tampilkan</button>
        </div>
        
    </div><br><br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pemasukan as $dataPemasukan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dataPemasukan->created_at }}</td>
                                    <td>{{ $dataPemasukan->nama }}</td>
                                    <td>{{ $dataPemasukan->jumlah_pemasukan }}</td>
                                    <td></td> <!-- Isi dengan data pengeluaran yang sesuai -->
                                </tr>
                            @endforeach

                            @foreach ($pengeluaran as $dataPengeluaran)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dataPengeluaran->created_at }}</td>
                                    <td>{{ $dataPengeluaran->keterangan }}</td>
                                    <td></td> <!-- Isi dengan data pemasukan yang sesuai -->
                                    <td>{{ $dataPengeluaran->jumlah_pengeluaran }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <!-- Jumlah total, atau apapun yang perlu ditampilkan di footer tabel -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Menambahkan Axios dari CDN -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('filter_button').addEventListener('click', function () {
          var startDate = document.getElementById('start_date').value;
          var endDate = document.getElementById('end_date').value;

          // Mengirimkan permintaan Ajax untuk memfilter data berdasarkan tanggal
          axios.get('/laporan/filter', {
              params: {
                  start_date: startDate,
                  end_date: endDate
              }
          })
          .then(function (response) {
              // Di sini Anda dapat memperbarui tabel dengan data yang difilter
              console.log(response.data);
          })
          .catch(function (error) {
              console.error(error);
          });
      });
  });
</script>
@endsection

