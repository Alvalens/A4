@extends('layout.master')

@section('title', 'A4 Learning')

@section('css')
  <link href="{{ url('assets/css/beranda/bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ url('assets/css/beranda/style.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/beranda/responsive.css') }}" rel="stylesheet" />
  <style>
    .navbar {
      /* delete color and shadow box */
      background-color: transparent !important;
      box-shadow: none !important;
    }

    /* on md delete .first */
    @media (max-width: 768px) {
      .first {
        display: none;
      }
    }

    .carousel-inner {
      min-height: 700px;
    }

    /* on md and upper set row-center margin top 100px */
    @media (min-width: 768px) {
      .row-center {
        margin-top: 100px;
      }
    }

    /* on 900 and loweer set margin top 100 px on class row-first */
    @media (max-width: 900px) {
      .row-first {
        margin-top: 100px;
      }
    }

    /* on betweem 700 and 900 set img-box margin top 100px */
    @media (min-width: 768px) and (max-width: 1000px) {
      .img-box {
        margin-top: 100px;
      }
    }

    .rotate {
      transform: rotate(180deg);
    }
    footer {
      background-color: #f9f6ef;
    }
  </style>
@endsection

@section('content')
  <div class="hero_area">
    <!-- slider section -->
    <section class="slider_section pt-5"
      style="min-height: 100vh; display: flex; justify-content: center; align-items: center;">
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
              <div class="row row-first">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1><img src="{{ url('assets/img/beranda/title-a4.png') }}" alt="" class="img-fluid"
                        width="80%"></h1>
                    <p>
                      Platform media pembelajaran interaktif dengan game-based education dan trivia berbasis website untuk
                      anak tunagrahita ringan, memiliki mengedepankan pada aksesibiltas, atraktif, dan antusias akademik.
                    </p>
                    <div class="btn-box">
                      <a type="button" href="{{ route('login') }}" class="button-menu button-1">
                        Mulai
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6  order-first order-md-last first">
                  <div class="img-box my-5" style="display: flex; justify-content: center; align-items: center;">
                    <img src="{{ url('assets/img/home.png') }}" alt=""class="img-fluid" width="80%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row row-center">
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
                      <a href="href="{{ route('level') }}"" class="button-menu button-2">
                        Pilih
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6  order-first order-md-last">
                  <div class="img-box" style="display: flex; justify-content: center; align-items: center;">
                    <img src="{{ url('assets/img/belajar.png') }}" alt=""class="img-fluid " width="70%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row row-center">
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
                      <a href="{{ route('bermain') }}" class="button-menu button-2">
                        Pilih
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6  order-first order-md-last">
                  <div class="img-box" style="display: flex; justify-content: center; align-items: center;">
                    <img src="{{ url('assets/img/bermain.png') }}" alt=""class="img-fluid " width="70%">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row row-center">
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
                      <a href="href="{{ route('tekateki') }}"" class="button-menu button-2">
                        Pilih
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6  order-first order-md-last">
                  <div class="img-box" style="display: flex; justify-content: center; align-items: center;">
                    <img src="{{ url('assets/img/trivia.png') }}" alt=""class="img-fluid" width="70%">
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

  <svg class="rotate" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 2400 800" opacity="1">
    <g fill="#f9f6ef " transform="matrix(1,0,0,1,8.7225341796875,186.77722930908203)">
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,90)" opacity="0.05"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,180)" opacity="0.37"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,270)" opacity="0.68"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,360)" opacity="1.00"></path>
    </g>
  </svg>
  <!-- about section -->

  <section class="about_section">
    <div class="container">
      <div class="detail-box">
        <div class="heading_container">
          <h2>
            Tentang Kami
          </h2>
        </div>
        <p>
          Sebuah website yang dikembangkan oleh Kelompok 4 Matakuliah Pemrograman Web sebagai bentuk peduli atas
          aksesibilitas dengan menekankan pada atraktif dan antusiasme akademik.
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

  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 2400 800" opacity="1">
    <g fill="#fffaef " transform="matrix(1,0,0,1,8.7225341796875,186.77722930908203)">
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,90)" opacity="0.05"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,180)" opacity="0.37"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,270)" opacity="0.68"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,360)" opacity="1.00"></path>
    </g>
  </svg>
  <section class="profile_section">
    <div class="container">
      <div>
        <h2 class="text-center text-dark md-3 fw-bold"> Meet The Team </h2>
      </div>
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
  <svg class="rotate" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 2400 800" opacity="1">
    <g fill="#fffaef " transform="matrix(1,0,0,1,8.7225341796875,186.77722930908203)">
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,90)" opacity="0.05"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,180)" opacity="0.37"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,270)" opacity="0.68"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,360)" opacity="1.00"></path>
    </g>
  </svg>
  <!-- us section -->

  <section class="us_section layout_padding-bottom" id="us_section">
    <div class="container">
      <div>
        <h2 class="text-center fw-bold">
          Kenapa Memilih Kami?
        </h2>
        <p class="text-center">
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
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 2400 800" opacity="1">
    <g fill="#f9f6ef " transform="matrix(1,0,0,1,8.7225341796875,186.77722930908203)">
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,90)" opacity="0.05"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,180)" opacity="0.37"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,270)" opacity="0.68"></path>
      <path
        d="M-10,10C42.08333333333333,26.666666666666668,137.91666666666666,109.79166666666667,240,90C342.08333333333337,70.20833333333333,380,-83.95833333333333,480,-85C580,-86.04166666666667,620,92.91666666666667,720,85C820,77.08333333333333,860,-112.375,960,-123C1060,-133.625,1100,11.708333333333336,1200,34C1300,56.291666666666664,1340,-21.416666666666664,1440,-16C1540,-10.583333333333334,1580,70.20833333333333,1680,60C1780,49.79166666666667,1820,-64.79166666666667,1920,-65C2020,-65.20833333333333,2060,51.916666666666664,2160,59C2260,66.08333333333333,2297.9166666666665,-102.04166666666667,2400,-31C2502.0833333333335,40.04166666666667,3254.1666666666665,206.04166666666669,2650,400C2045.8333333333335,593.9583333333333,156.25,795.8333333333334,-500,900"
        transform="matrix(1,0,0,1,0,360)" opacity="1.00"></path>
    </g>
  </svg>
@endsection

@section('js')
  <script type="text/javascript" src="{{ url('assets/js/beranda/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('assets/js/beranda/bootstrap.js') }}"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>
@endsection
