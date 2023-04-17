@extends('layout.master')
@section('title', 'Selamat datang!')

@section('css')
  <link href="{{ url('assets/css/index.css') }}" rel="stylesheet">
@endsection

@section('body-style')
  overflow-x: hidden;
@endsection

@section('content')
<section data-bss-parallax-bg="true">
  <img src="{{ url('assets/img/bg-sky.jpg') }}" style="background-size: cover;" class="img-hero2" alt="">
  <div class="container d-flex flex-column justify-content-center align-items-center h-100">
    <div class="row">
      <div class="col-md-6">
        <div class="img text-center text-md-start">
          <img src="{{ url('assets/img/beranda/title-a4.png') }}" alt="" class="img-fluid" width="90%" style="margin-top: -10%">
        </div>
        <div class="desc text-center text-md-start">
          <img src="{{ url('assets/img/beranda/desc.png') }}" alt="" class="img-fluid" width="80%">
        </div>
        <div class="button text-start text-md-start">
          @if(Auth::check())
            <a href="{{ route('about') }}" type="button">          
              <img src="{{ url('assets/img/beranda/btn-lebihlanjut.png') }}" alt="" class="img-fluid" width="80%">
            </a>
          @else
            <a href="{{ route('login') }}" type="button">
              <img src="{{ url('assets/img/beranda/btn-mulai.png') }}" alt="" class="img-fluid" width="80%">
            </a>
            <a href="{{ route('about') }}" type="button">
              <img src="{{ url('assets/img/beranda/btn-lebihlanjut.png') }}" alt="" class="img-fluid" width="80%">
            </a>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="img-main text-center text-md-start">
          <img src="{{ url('assets/img/beranda/kids.png') }}" draggable="false" class="img-fluid" style="width: 560px; margin-top: 100px;">
        </div>
      </div>
    </div>
  </div>
</section>

<div class="text-center">
  <a class="btn-down">
    <i class="fa-solid fa-arrow-down"></i>
  </a>
</div>

<section id="section2">
  <img src="{{ url('assets/img/bg.jpg') }}" style="background-size: cover; max-height: 900px;" class="img-hero4" alt="">
  <div class="container d-flex flex-column justify-content-center align-items-center h-100">
    <div class="row d-flex flex-column justify-content-center align-items-center">
      <div class="head">
        <img src="{{ url('assets/img/beranda/title-ayokitamulai.png') }}" alt="" class="img-fluid img-sec" width="60%" style="margin-top: 20%">
        <img src="{{ url('assets/img/beranda/title-geser.png') }}" alt="" class="img-fluid img-sec2"  width="90%">
      </div>
      <div class="col">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="{{ route('belajar') }}">
                <img src="{{ url('assets/img/beranda/pilih-belajar.png') }}" class="img-fluid text-center img-c" alt="">
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{ route('bermain') }}">
                <img src="{{ url('assets/img/beranda/pilih-bermain.png') }}" class="img-fluid text-center img-c" alt="...">
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{ route('tekateki') }}">
                <img src="{{ url('assets/img/beranda/pilih-tekateki.png') }}" class="img-fluid text-center img-c" alt="...">
              </a>
            </div>
          </div>

          <!-- Button -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prevs-icon" style="font-size: 8rem" aria-hidden="true">
              <i class="fa-solid fa-chevron-left"></i>
            </span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-nexst-icon" style="font-size: 8rem" aria-hidden="true">
              <i class="fa-solid fa-chevron-right"></i>
            </span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

@section('js')
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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