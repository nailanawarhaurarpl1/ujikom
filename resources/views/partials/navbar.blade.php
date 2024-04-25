<style>
  .dropdown-item:hover {
      background-color: #999 !important;
  }
  .count {
      position: absolute;
      top: -8px;
      right: -8px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      color: white;
      font-size: 12px;
      line-height: 20px;
      text-align: center;
  }
</style>
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
      </button>

      <ul class="navbar-nav navbar-nav-right">
        @php
        // Ambil data pengingat dengan tanggal hari ini untuk pengguna yang login
        $pengingatHariIni = \App\Models\Pengingat::whereDate('tanggal', now()->toDateString())
                                ->where('id_user', auth()->id())->get();
    @endphp
    
          <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
              </a>
              <span class="count bg-danger">{{ $pengingatHariIni->count() }}</span>
              @if($pengingatHariIni->count() > 0)
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                      <h6 class="p-3 mb-0" style="color: #000000">Notifikasi</h6>
                      <div class="dropdown-divider"></div>
                      @foreach($pengingatHariIni as $pengingat)
                          <a class="dropdown-item preview-item">
                              <div class="preview-thumbnail">
                                  <div class="preview-icon rounded-circle bg-white ">
                                      <i class="mdi mdi-calendar text-dark"></i>
                                  </div>
                              </div>
                              <div class="preview-item-content">
                                  <p class="preview-subject mb-1">Pengingat Hari Ini</p>
                                  <p class="text-muted ellipsis mb-0">{{ $pengingat->catatan }}</p>
                              </div>
                          </a>
                      @endforeach
                      <div class="dropdown-divider"></div>
                      <p class="p-3 mb-0 text-center" style="color: #000000">Lihat semua notifikasi</p>
                  </div>
              @endif
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                      <img class="img-xs rounded-circle" alt="" id="navbar-profile-image">
                      <p class="mb-0 d-none d-sm-block navbar-profile-name">Member</p>
                      <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="/profil">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-white rounded-circle">
                              <i class="mdi mdi-settings text-success"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <p class="preview-subject mb-1"> Profil</p>
                      </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="/" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-white rounded-circle">
                              <i class="mdi mdi-logout text-danger"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <p class="preview-subject mb-1">Keluar</p>
                      </div>
                  </a>
              </div>
          </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-format-line-spacing"></span>
      </button>
  </div>
</nav>

<script>
  window.onload = function() {
      var profileImage = localStorage.getItem('profileImage');
      if (profileImage) {
          document.getElementById('navbar-profile-image').src = profileImage;
      }
  };
</script>
