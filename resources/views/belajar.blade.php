@extends('layout.master')
@section('title', 'Yuk, Belajar!')

  <link href="{{ url('assets/css/belajar.css') }}" rel="stylesheet">

  <style>
    .circle-del {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #bb3232;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 30px;
      color: white;
    }
    .circle-edit {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #adbb32;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 30px;
      color: white;
    }
    /* remove buttonm style in del */
    .del {
      background-color: transparent;
      border: none;
      color: white;
    }
    /* remove attribute in all link */
  </style>

@section('body-style')
  background-image: url({{ url('assets/img/bg-sky.jpg') }});
  background-repeat: no-repeat;
@endsection

@section('content')
  <!-- Section 1 -->
   <section id="call-to-action" class="call-to-action">
    <div class="section-header-1">
      <img src="{{ url('assets/img/belajar/title-maribelajar.png') }}">
      <img src="{{ url('assets/img/belajar/title-videopembelajaran.png') }}">
    </div>
    <div class="container text-center" data-aos="zoom-out">
      <a href="https://youtu.be/pUn4kWVm3F0" class="glightbox play-btn"></a>
      <br>
    </div>
  </section>
  <!-- Section 1 -->

  <a href="#our-services" class="scroll-arrow"><i class="bi bi-chevron-double-down"></i></a>
  {{-- youtube links --}}
<section class="main">
  <div class="container services" data-aos="fade-up">
    <div class="section-header">
      <img src="{{ url('assets/img/belajar/title-kliktombol.png') }}">
    </div>
    <div id="our-services" class="our-services">
      {{-- main container --}}
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2" data-aos="fade-up" data-aos-delay="100">
        <!-- Youtube links -->
        @forelse ($materies as $materi)
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              {{-- main --}}
              <div class="icon">
                <i class="bi bi-filter-left"></i>
              </div>
              <h3>{{ $materi->judul }}</h3>
              <p>{{ $materi->deskripsi }}</p>
              <iframe width="350" height="196.875" src="{{ $materi->link }}" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        @empty
          <p>No materies available.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>
@endsection