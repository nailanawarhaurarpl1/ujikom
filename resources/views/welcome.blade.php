<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bangdul | Halaman Utama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('guest/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('guest/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('guest/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('guest/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('guest/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Anyar
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center" style="margin-left: 50px">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">bangdul@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +62 821 1929 1819
      </div>
      
    </div>
    <div class="cta d-none d-md-block " >
      <a href="/register-member" class="scrollto" style="margin-right: 50px">Mulai Sekarang</a>
    </div>  
    
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">
     
      <img src="{{ asset('image/bangdul.png')}}" alt="Deskripsi Gambar" width="60px" height="60px"><h1 style="font-size: 25px; color: white; margin-right: 650px; margin-bottom: 5px">Bangdul </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="{{ asset('image/bangdul.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Selamat Datang</span></h2>
          <p class="animate__animated animate__fadeInUp">Aplikasi ini dapat membantu Anda dalam mencatat pemasukan dan pengeluaran keuangan Anda menjadi lebih mudah.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Berhenti Mencatat Menggunakan Kertas</h2>
          <p class="animate__animated animate__fadeInUp">Aplikasi Bangdul ini memastikan segala sesuatu tetap teratur karena memiliki fitur pengingat supaya Anda tidak melewati tenggat/acara penting. Ucapkan selamat tinggal pada bon kertas!

          </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Selengkapnya</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Pelaporan Lengkap</h2>
          <p class="animate__animated animate__fadeInUp">Anda bisa melihat data pengeluaran dan pemasukan sesuai dengan tanggal yang Anda inginkan!</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Baca Selengkapnya</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-bar-chart"></i></div>
              <h4 class="title"><a href="">Statistika</a></h4>
              <p class="description">Lihat perkembangan data pemasukan dan pengeluaran Anda dengan statistika.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-arrow-down-up"></i></div>
              <h4 class="title"><a href="">Pemasukan & Pengeluaran</a></h4>
              <p class="description">Catat pemasukan dan pengeluaran anda tanpa menggunakan kertas.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-alarm"></i></div>
              <h4 class="title"><a href="">Pengingat</a></h4>
              <p class="description">Lupa tenggat/acara penting? fitur ini yang akan mengingatkan Anda melalui notif.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-file-earmark-text"></i></div>
              <h4 class="title"><a href="">Laporan</a></h4>
              <p class="description">Lihat pemasukan sekaligus pengeluaran dalam satu laporan.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
          <p>Aplikasi Bangdul untuk mengelola keuangan pribadi, mencatat transaksi dari kegiatan keluar masuk. Web ini sangat membantu bagi semua orang dalam mencatat keuangan mereka, tanpa kertas tinggal ketik dan bisa diakses dimana saja selama memiliki internet.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Dijamin....
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Tidak membutuhkan kalkulator untuk menghitung</li>
              <li><i class="ri-check-double-line"></i> Fitur yang tersedia mudah digunakan</li>
              <li><i class="ri-check-double-line"></i> Bermanfaat ^^</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Penasaran bagaimana cara kerja aplikasi ini? Ayo login sekarang dan coba fitur - fitur yang sudah disediakan pada aplikasi Bangdul ini !!
            </p>
            <a href="/register-member" class="btn-learn-more">Coba Sekarang</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
        </div>
        <center>
          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <form action="https://formspree.io/f/xjvnyzyg" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="full-name" class="form-control" id="full-name" placeholder="Masukan nama lengkap" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukan no whatsapp" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Masukan pesan" required></textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-outline-success text-center">Kirim Sekarang</button>
            </form>

          </div>
        </center>
        
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

   

    <div class="container">
      <div class="copyright">
        &copy; 2024 Copyright <strong><span>Bangdul</span></strong>. All Rights Reserved
        
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('guest/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('guest/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('guest/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('guest/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('guest/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('guest/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('guest/assets/js/main.js')}}"></script>

</body>

</html>