<style>
/* Warna abu-abu saat dihover */
.nav-item.menu-items:hover .nav-link {
    background-color: #ccc !important;
    color: black !important;
    
}

/* Warna abu-abu saat aktif */
.nav-item.menu-items.active > .nav-link {
    background-color: #999 !important;
    color: white !important;
    
}



</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: white">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background-color: white"><br>
    <img src="{{ asset('image/bangdul.png')}}" width="70px" height="70px"/><h1 style="font-size: 25px; color: black">Bangdul &nbsp;&nbsp;&nbsp;&nbsp;</h1>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('image/mini.png')}}" width="180px" height="180px" alt="logo" /></a>
  </div>
  <ul class="nav">
    
{{--    
    <li class="nav-item menu-items">
      <a class="nav-link" href="/member/dashboard">
        <span class="menu-icon">
          <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title">Statistika</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item menu-items">
      <a class="nav-link" href="/member/kategori">
        <span class="menu-icon">
          <span class="mdi mdi-format-list-bulleted-square" style="color: green"></span>
        </span>
        <span class="menu-title">Kategori</span>
      </a>
    </li> --}}
    <li class="nav-item menu-items">
      <a class="nav-link" href="/member/pemasukan">
        <span class="menu-icon">
          <span class="mdi mdi-calendar-import" style="color: purple"></span>
        </span>
        <span class="menu-title">Pemasukan</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/member/pengeluaran">
        <span class="menu-icon">
          <span class="mdi mdi-calendar-export" style="color: orange"></span>
        </span>
        <span class="menu-title">Pengeluaran</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/member/pengingat">
        <span class="menu-icon">
          <i class="mdi mdi-table-large" style="color: yellow"></i>
        </span>
        <span class="menu-title">Pengingat</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/member/laporan">
        <span class="menu-icon">
          <span class="mdi mdi-file" style="color: pink"></span>
        </span>
        <span class="menu-title">Laporan</span>
      </a>
    </li>
  </ul>
</nav>
