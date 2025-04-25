<nav class="sidebar sidebar-offcanvas sidebar-fixed" id="sidebar" style="background-color: #10243c">
<style>
    .sidebar .menu-title, .sidebar span {
        color: white !important;
         font-weight: bold;
    }
    .sidebar .nav-item a.nav-link {
            color: white !important; /* Warna teks putih */
        }

        .sidebar .nav-item a.nav-link:hover {
            color: #ffcc00 !important; /* Warna hover jika diperlukan */
        }
</style>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('admin/dashboard') }}">
              {{-- <i class="icon-grid menu-icon"></i> --}}
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{ url('admin/master_kartukeluarga') }}" aria-expanded="false" aria-controls="ui-basic">
              {{-- <i class="icon-columns menu-icon"></i> --}}
              <span class="menu-title">Kartu Keluarga</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{ url('admin/pengajuan') }}" aria-expanded="false" aria-controls="form-elements">
              {{-- <i class="icon-columns menu-icon"></i> --}}
              <span class="menu-title">Pengajuan Surat</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#master-akun"
                aria-expanded="false" aria-controls="master-akun">
                {{-- <i class="icon-head menu-icon"></i> --}}
                <span>Master Akun</span>
                <i class="menu-arrow"></i>
            </a>
            <ul id="master-akun" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="nav-item">
                    <a href="{{ url('admin/akunrw') }}" class="nav-link">Akun RW</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/akunrt') }}" class="nav-link">Akun RT</a>
                </li>
            </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="{{ url('admin/mastersurat') }}" aria-expanded="false" aria-controls="error">
              {{-- <i class="icon-ban menu-icon"></i> --}}
              <span class="menu-title">Master Surat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/berita') }}">
              {{-- <i class="icon-paper menu-icon"></i> --}}
              <span class="menu-title">Berita</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/landingpage') }}">
              {{-- <i class="icon-paper menu-icon"></i> --}}
              <span class="menu-title">Website</span>
            </a>
          </li>
        </ul>
      </nav>

