@extends('layouts.member')

@section('content')

<style>
    /* Custom style for the content */
    .content-section {
        padding: 50px;
        border-radius: 20px;
        background-color: #ffffff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Custom style for the feature image */
    .feature-image {
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        max-width: 350px;
        height: auto;
    }

    /* Custom style for headings */
    .section-title {
        font-size: 33px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
    }

    /* Custom style for paragraph */
    .section-description {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
    }

    /* Custom style for feature list */
    .feature-list {
        list-style-type: none;
        padding-left: 0;
    }

    .feature-list li {
        font-size: 18px;
        color: #666;
        margin-bottom: 15px;
    }

    /* Custom style for button */
    .btn-primary {
        background-color: #007bff;
        color: #ffffff;
        border-radius: 30px;
        padding: 15px 30px;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container content-section">
    <h2 class="section-title" style="margin-top: -25px">Selamat Datang Di Aplikasi Bangdul</h2>
    <p class="section-description" style="margin-top: -20px">Aplikasi ini adalah solusi lengkap untuk mengelola keuangan pribadi Anda dengan lebih efisien dan efektif. Dengan fitur-fitur yang lengkap, Bangdul membantu Anda mengatur keuangan Anda dengan lebih baik.</p>
    <div class="row align-items-center">
        <div class="col-lg-6">
          <h5 style="color: #333; font-size: 25px; font-weight: bold; margin-top: -70px ">Fitur Utama:</h5>
            <ul class="feature-list" style="margin-top: 15px">
              <li>&nbsp;&nbsp;&nbsp; <b>-</b> &nbsp; Pantau Pemasukan</li>
                <li>&nbsp;&nbsp;&nbsp; <b>-</b> &nbsp; Pantau Pengeluaran</li>
                <li>&nbsp;&nbsp;&nbsp; <b>-</b> &nbsp; Laporan Akurat</li>
                <li>&nbsp;&nbsp;&nbsp; <b>-</b> &nbsp; Notifikasi Pintar</li>
            </ul>            
            <a href="/member/pemasukan" class="btn btn-primary">Coba Sekarang</a>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('image/bangdul.png')}}" class="img-fluid feature-image" alt="Feature Image">
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
