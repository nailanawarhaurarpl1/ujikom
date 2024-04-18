@extends('layouts.member')

@section('content')

<style>
  #barChart {
    background-color: #fff; /* Ubah warna background chart menjadi putih */
}
.card {
            background-color: #fff; /* Ubah warna background card menjadi putih */
            border: none; /* Hilangkan border card */
            margin-bottom: -15px
        }
</style>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card corona-gradient-card">
        <div class="card-body py-0 px-0 px-sm-3">
          <div class="row align-items-center">
            <div class="col-4 col-sm-3 col-xl-2">
              <img src="{{ asset('member/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
            </div>
            <div class="col-5 col-sm-7 col-xl-8 p-0">
              
              <h4 class="mb-1 mb-sm-0">Selamat Datang </h4>
              <p class="mb-0 font-weight-normal d-none d-sm-block">Di Aplikasi Bangdul</p>
            </div>
            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
              <span>
                <a href="#" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Bangdul</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    
    

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <canvas id="barChart" style="height:230px"></canvas>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

{{-- <script src="{{ asset('member/assets/vendors/js/vendor.bundle.base.js') }}"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    {{-- <script src="{{ asset('member/assets/vendors/chart.js/Chart.min.js') }}"></script> --}}
    <!-- End plugin js for this page -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    {{-- <script src="{{ asset('member/assets/js/chart.js') }}"></script> --}}
    <!-- End custom js for this page -->

  @endsection
  
  