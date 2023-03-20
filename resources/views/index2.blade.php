@extends('layout.master')
@section('title', 'Selamat Datang!')
@section('css', 'index2')

@section('body-style')
  width: 100%;
  position: relative;
  background: white;
  overflow-x: hidden;
@endsection

@section('content') 

<!-- ======= Hero Section ======= -->
<img src="assets/img/bg-sky.jpg" class="img-hero2">
<section id="hero" class="hero">
  <div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <img src="assets/img/h1.png" class="img-fluid img-hero3">
        <h2>(Aksesibilitas, Atraktif, Antusias, Akademik)</h2>
        <p>Platform media pembelajaran interaktif dengan game-based education dan trivia berbasis website untuk anak
          tunagrahita ringan, mengedepankan pada aksesibiltas, atraktif, dan antusiasme akademik.</p>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="#about" class="btn-get-started">Mulai</a>
          <a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Lebih Lanjut</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="assets/img/pensilterbang.png" class="img-fluid img-hero" alt="" data-aos="zoom-out" data-aos-delay="100">
      </div>
    </div>
  </div>
</section>
<!-- End Hero Section -->



  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-header justify-content-center align-items-center">
        <img src="assets/img/h11.png" alt="" class="img-fluid img-sec">
        <img src="assets/img/geser.png" alt="" class="img-fluid img-sec2">
      </div>

      <div class="row gy-4 d-flex justify-content-center">
        <div class="col-lg-6 d-flex">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/belajar1.png" class="img-fluid text-center img-sec3">
              </div>
              <div class="carousel-item">
                <img src="assets/img/bermain1.png" class="img-fluid text-center img-sec3">
              </div>
              <div class="carousel-item">
                <img src="assets/img/tekateki1.png" class="img-fluid text-center img-sec3">
              </div>
            </div>

            {{-- btn --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prevs-icon" style="font-size: 3rem; font-weight: 900; color: rgb(60, 129, 177)" aria-hidden="true"><</span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-nexst-icon" style="font-size: 3rem; font-weight: 900; color: rgb(60, 129, 177)" aria-hidden="true">></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End About Us Section -->

@endsection