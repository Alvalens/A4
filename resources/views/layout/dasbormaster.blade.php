<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- icon --}}
  <link rel="icon" href="{{ url('assets/img/beranda/title-a4.png') }}">
  <title>Dasbor Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="{{ url('assets/css/dasbor/cs-skin-elastic.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/dasbor/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/dasbor/table.css') }}">
  {{-- <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet"> --}}

  {{-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" /> --}}


  @yield('css')
  {{-- jquery --}}
  <script src="{{ url('js/jq.js') }}"></script>
</head>

<body>
  <!-- NAVBAR -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

          <li class="@yield('dasbor')">
            <a href="{{ route('dasbor') }}"><i class="menu-icon fa fa-laptop"></i>Dasbor </a>
          </li>
          @if (auth()->user()->role === 'admin')
            <li class="menu-title">Akun</li>
            <li class=" @yield('akunpengguna')">
              <a href="{{ route('akun.index') }}"> <i class="menu-icon ti-user"></i>Akun Pengguna</a>
            </li>
          @endif

          <li class="menu-title">Data</li>
          <li class="@yield('datasiswa')">
            <a href="{{ route('datasiswa') }}"> <i class="menu-icon ti-id-badge "></i>Data Siswa </a>
          </li>
          <li class="@yield('datamateri')">
            <a href="{{ route('datamateri') }}"> <i class="menu-icon ti-book "></i>Data Materi </a>
          </li>
          <li class="@yield('datatekateki')">
            <a href="{{ route('datatekateki') }}"> <i class="menu-icon ti-view-list-alt "></i>Data Teka-teki</a>
          </li>

        </ul>
      </div>
    </nav>
  </aside>
  <!-- NAVBAR -->

  <!-- HEADER -->
  <div id="right-panel" class="right-panel">
    <header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="./"><img src="{{ url('assets/img/dasbor/logo.png') }}" alt="Logo"></a>
          <a class="navbar-brand hidden" href="./"><img src="{{ url('assets/img/dasbor/logo.png') }}"
              alt="Logo"></a>
          <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
      </div>
      <div class="top-right">
        <div class="header-menu">
          <div class="header-left">
            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
              <form class="search-form">
                <input class="form-control mr-sm-2" type="text" placeholder="Cari ..." aria-label="Search">
                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
              </form>
            </div>

            <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                  @if (Auth::user()->picture)
                    <img class="user-avatar rounded-circle" src="{{ asset('storage/avatars/' . Auth::user()->picture) }}"
                      alt="User Avatar">
                  @else
                    <img class="user-avatar rounded-circle" src="{{ url('assets/img/dasbor/user.png') }}"
                      alt="User Avatar">
                  @endif
              </a>

              <div class="user-menu dropdown-menu">
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <!-- Include CSRF token for security -->
                  <button type="submit" class="nav-link" style="border: none;background: none; cursor:pointer;">
                    <i class="fa fa-power-off"></i>Logout</button>
                </form>
                {{-- back to home --}}
                <a class="nav-link" href="{{ route('index') }}"><i class="fa fa-home"></i>Kembali</a>
              </div>
            </div>

          </div>
        </div>
    </header>
    <!-- HEADER -->

    <!-- CONTENT START HERE -->
    @section('content')

    @show
    <!-- CONTENT END HERE -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ url('assets/js/dasbor/main.js') }}"></script>
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
      // Menampilkan kembali modal saat halaman direfresh jika terdapat error
      var hasError = document.querySelector('.is-invalid');
      if (hasError) {
        var fileModal = new bootstrap.Modal(document.getElementById('fileModal'));
        // show the modal that has the error
        fileModal.show();
      }
    </script>

    {{-- js each page to resolve conflict --}}
    @yield('js')
    <script>
      setTimeout(function() {
        $('.alert').fadeOut('slow');
      }, 5000);
    </script>
</body>

</html>
