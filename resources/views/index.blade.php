@extends('layout.master')
@section('title', 'Selamat datang!')
@section('css', 'index')

@section('content')
<style>
  .clouds-img{
    /* move the cloud */
    animation: moveclouds 15s linear infinite;
    /* fix the position of the clouds */
    margin-top: -100px;

  }
  @keyframes moveclouds {
    0% {
      margin-left: 1000px;
    }
    100% {
      margin-left: -1000px;
    }
  }

  /* on sm jistify jtq */
  @media (max-width: 768px) {
    .jtq {
      text-align: justify !important;
      padding: 0 15px;
      /* font size */
      font-size: 14px;
    }
  }

</style>
  <body style="overflow-x hidden">
    <section data-bss-parallax-bg="true" style="background: url('assets/img/bg-sky.jpg'); background-size: cover;"
      class="vh-100" class="img-hero2">
      {{-- main  --}}
      <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <div class="row">
          <div class="col-md-6">
            {{-- gambar --}}
            <div class="img text-center text-md-start" >
              <img src="{{ url('assets/img/h1.png') }}" alt="" class="img-fluid"
                style=>
            </div>
            {{-- sub h --}}
            <div class="subh text-center text-md-start">
              <p>(Aksesibilitas, Atraktif, Antusias, Akademik)</p>
            </div>
            {{-- desc --}}
            <div class="desc text-center text-md-start jtq">
              <p>Platform media pembelajaran interaktif dengan game-based education dan trivia berbasis website untuk anak
                tunagrahita ringan, memiliki mengedepankan pada aksesibiltas, atraktif, dan antusias akademik.</p>
            </div>
            {{-- button --}}
            <div class="button text-start text-md-start">
              <a href="login" type="button" class="buthon mx-3"> Mulai!</a>
              <a href="/about" type="button" class="buthon2"> lebih lanjut</a>
            </div>
          </div>
          <div class="col-md-6">
            {{-- main img --}}
            <div class="img-main text-center text-md-start">
              <img src="{{ url('pictures/pensilterbang.png') }}" alt="pensil" draggable="false" class="img-fluid"
                style="height:700px; width:700px;">
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- create a fixed button in the middle bottom functionm to scroll down --}}
    <div class=" text-center">
      <a class="btn-down">
        <i class="fa-solid fa-arrow-down"></i>
      </a>
    </div>

    {{-- hal 2 --}}
    <section style="background: url('assets/img/bg.jpg'); background-size: cover;" class="vh-100 d-flex" id="section2">
      {{-- main --}}
      <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <div class="row d-flex flex-column justify-content-center align-items-center">
          {{-- head --}}
          <img src="{{ url('assets/img/h11.png') }}" alt="" class="img-fluid img-sec">
          <img src="assets/img/geser.png" alt="" class="img-fluid img-sec2">
          {{-- carousel  --}}
          <div class="col">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <a href="/belajar">
                  <img src="{{ url('assets/img/belajar1.png') }}" class="img-fluid text-center img-c" alt="..."></a>
                </div>
                <div class="carousel-item">
                  <a href="/bermain">
                  <img src="{{ url('assets/img/bermain1.png') }}" class="img-fluid text-center img-c" alt="..."></a>
                </div>
                <div class="carousel-item">
                  <a href="/teka-teki">
                  <img src="{{ url('assets/img/tekateki1.png') }}" class="img-fluid text-center img-c" alt="..."></a>
                </div>
              </div>
              {{-- btn --}}
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prevs-icon" style="font-size: 8rem" aria-hidden="true"><i class="fa-solid fa-chevron-left"></i>
                  </span>
                    <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-nexst-icon" style="font-size: 8rem"aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
  {{-- jq --}}
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </section>
    {{-- paralax --}}
    <script src="{{ url('js/parallax.js') }}"></script>
    <script>
      // hide btn-down on scroll
      $(document).ready(function() {
        var lastScrollTop = 0;
        $(window).scroll(function() {
          var scrollTop = $(this).scrollTop();
          if (scrollTop > lastScrollTop) {
            $('.btn-down').fadeOut('slow');

          } else {
            $('.btn-down').fadeIn('slow');

          }
          lastScrollTop = scrollTop;
        });
      });
      // make btn-down scroll to the next section
      const btnDown = $('.btn-down');
      const section2 = document.getElementById('section2');

      btnDown.on('click', () => {
        section2.scrollIntoView({
          behavior: 'smooth'
        });
      });
    </script>

  @endsection
