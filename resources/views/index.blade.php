<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Selamat Datang!</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ url('assets/css/beranda/bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ url('assets/css/beranda/style.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/beranda/responsive.css') }}" rel="stylesheet" />

  <!-- Fonts Style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="hero_area">
    
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="{{ url('assets/img/beranda/title-a4.png') }}" alt="">
          </a>
          <div class="" id="">
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1><img src="{{ url('assets/img/beranda/title-a4.png') }}" alt="" class="img-fluid" width="80%" style="margin-top:-100px"></h1>
                    <p>
                      Platform media pembelajaran interaktif dengan game-based education dan trivia berbasis website untuk anak tunagrahita ringan, memiliki mengedepankan pada aksesibiltas, atraktif, dan antusias akademik.
                    </p>
                    <div class="btn-box">
                      <a type="button" href="{{ route('login') }}" class="button-menu button-1">
                        Mulai
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ url('assets/img/home.png') }}" alt=""class="img-fluid" width="80%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                      <h5>
                        01
                      </h5>
                    </div>
                    <h1>
                      Yuk, <br>
                      <span>
                        Belajar!
                      </span>
                    </h1>
                    <p>
                      Belajar dengan seru dan menyenangkan di sini. <br> Yuk, klik Mulai!
                    </p>
                    <div class="btn-box">
                      <a href="/belajar" class="button-menu button-2">
                        Pilih
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ url('assets/img/belajar.png') }}" alt=""class="img-fluid mb-5" width="70%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                      <h5>
                        02
                      </h5>
                    </div>
                    <h1>
                      Yuk, <br>
                      <span>
                        Bermain!
                      </span>
                    </h1>
                    <p>
                      Temukan permainan yang asyik disini. <br> Yuk, klik Mulai!
                    </p>
                    <div class="btn-box">
                      <a href="/bermain" class="button-menu button-2">
                        Pilih
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ url('assets/img/bermain.png') }}" alt=""class="img-fluid mb-5" width="70%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                      <h5>
                        03
                      </h5>
                    </div>
                    <h1>
                      Yuk, <br>
                      <span>
                        Menebak!
                      </span>
                    </h1>
                    <p>
                      Tebak jawabanmu disini, apakah benar? <br> Yuk, klik Mulai!
                    </p>
                    <div class="btn-box">
                      <a href="/teka-teki" class="button-menu button-2">
                        Pilih
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ url('assets/img/trivia.png') }}" alt=""class="img-fluid mb-5" width="70%">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="detail-box">
        <div class="heading_container">
          <h2>
            Deskripsi
          </h2>
        </div>
        <p>
          Sebuah website yang dikembangkan oleh Kelompok 4 Matakuliah Pemrograman Web sebagai bentuk peduli atas aksesibilitas dengan menekankan pada atraktif dan antusiasme akademik.
        </p>
        <div class="btn-box">
          <a href="#us_section">
            <span>
              Lihat Keunggulan
            </span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- animal section -->

  <section class="profile_section layout_padding">
    <div class="container">
      <div class="profile_container">
        <div class="box b1">
          <div class="img-box">
            <img src="{{ url('assets/img/profile/p1.png') }}" alt="">
          </div>
          <div class="detail-box">
            <p> <strong> A D I N D A </strong> <br> Dinia Alexandra </p>
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="{{ url('assets/img/profile/p2.png') }}" alt="">
          </div>
          <div class="detail-box">
            <p> Ahfas Zein <br> <strong> A Z Z I D A N </strong> </p>
          </div>
        </div>
        <div class="box b1">
          <div class="img-box">
            <img src="{{ url('assets/img/profile/p3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <p> <strong> A I S Y A H </strong> </p>
          </div>
        </div>
        <div class="box b2">
          <div class="img-box">
            <img src="{{ url('assets/img/profile/p4.png') }}" alt="">
          </div>
          <div class="detail-box">
            <p> <strong> A L V A L E N </strong> <br> Shafelbilyunazra </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end animal section -->

  <!-- us section -->

  <section class="us_section layout_padding-bottom" id="us_section">
    <div class="container">
      <div class="heading_container">
        <img src="images/heading-img.png" alt="">
        <h2>
          Kenapa Memilih Kami?
        </h2>
        <p>
          Web pembelajaran ini memiliki banyak keunggulan dari web lain:
        </p>
      </div>
      <div class="us_container">
        <div class="box">
          <div class="img1-box">
            <img src="{{ url('assets/img/aksesibilitas.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6 style="text-align: center">
              AKSESIBILITAS
            </h6>
            <p style="text-align: center"> 
              Menyediakan media <br> pembelajaran berbasis web <br> yang ramah akses bagi <br> tunagrahita
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img1-box">
            <img src="{{ url('assets/img/antusias.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6 style="text-align: center">
              ANTUSIASME
            </h6>
            <p style="text-align: center"> 
              Memberi pengalaman <br> pembelajaran berbasis web <br> yang seru & asyik
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img1-box">
            <img src="{{ url('assets/img/attraktif.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6 style="text-align: center">
              ATRAKTIVITAS
            </h6>
            <p style="text-align: center"> 
              Memberi tampilan <br> pembelajaran berbasis web <br> yang memikat mata
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img1-box">
            <img src="{{ url('assets/img/akademik.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h6 style="text-align: center">
              AKADEMIK
            </h6>
            <p style="text-align: center"> 
              Menyediakan media <br> pembelajaran berbasis web <br> yang meningkatkan prestasi <br> dan kinerja akademik
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end us section -->

  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <footer>
      <div class="text-center">
        <p>© 2023 Copyright: <br> A4 Team | S1 TI A | Universitas Negeri Malang</p>
      </div>
    </footer>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="{{ url('assets/js/beranda/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('assets/js/beranda/bootstrap.js') }}"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>

</body>
</html>