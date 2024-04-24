<!-- dashboard.blade.php -->

@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="{{ asset('member/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              <center>
              <h1 class="mb-1 mb-sm-0" style="font-size: 25px">Selamat Datang Di Halaman Admin</h1>
            </center>
            </div>
            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    
  <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-sm-3 col-xl-2">
                    <img src="{{ asset('image/user.png')}}" class="gradient-corona-img img-fluid" alt="" style="margin-left: 20px; width: 100px;">
                </div>
                <div class="col-5 col-sm-7 col-xl-8 p-0">
                    <div class="d-flex align-items-center align-self-start" style="margin-left: 40px">
                        <h2 class="mb-0" style="font-size: 22px">Total Keseluruhan Member</h2><br><br>
                    </div>
                    <h6 class="text-muted font-weight-normal" style="margin-left: 40px; font-size: 25px"><b>{{ $totalMembers }}</b></h6>
                </div>
                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center"><br>
                    <div class="icon icon-box-success " style="margin-left: 90px; width: 55px; height: 55px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M7 15h2c0 1.08 1.37 2 3 2s3-.92 3-2c0-1.1-1.04-1.5-3.24-2.03C9.64 12.44 7 11.78 7 9c0-1.79 1.47-3.31 3.5-3.82V3h3v2.18C15.53 5.69 17 7.21 17 9h-2c0-1.08-1.37-2-3-2s-3 .92-3 2c0 1.1 1.04 1.5 3.24 2.03C14.36 11.56 17 12.22 17 15c0 1.79-1.47 3.31-3.5 3.82V21h-3v-2.18C8.47 18.31 7 16.79 7 15"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan bagian chart jika diperlukan -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <canvas id="myChart" style="height:230px"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript">
  
  var labels =  {{ Js::from($labels) }};
  var users =  {{ Js::from($data) }};

  const data = {
      labels: labels,
      datasets: [{
          label: 'Member',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
      }]
  };

  const config = {
      type: 'bar',
      data: data,
      options: {}
  };

  const myChart = new Chart(
      document.getElementById('myChart'),
      config
  );

</script>

@endpush