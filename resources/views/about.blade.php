@extends('layout.master')
@section('title', 'Tentang')
@section('css', 'belajar')

@section('content')    
  {{-- fixed button  --}}
  <div class="text-center">
    <a class="btn-down">
      <i class="fa-solid fa-arrow-down"></i>
    </a>
  </div>

  {{-- hal 2 --}}

  <section style="background: url('pictures/bgdes.png'); background-size: cover;" class="vh-100 d-flex" id="section2">
    {{-- nav --}}
    <nav id="navbar" class="navbar fixed-top">
      <ul class="menu">
        <li><a href="/"><img src="pictures/navbar/beranda.png" alt="Home"></a></li>
        <li><a href="/belajar"><img src="pictures/navbar/belajar.png" alt="Home"></a></li>
        <li><a href="/bermain"><img src="pictures/navbar/bermain.png" alt="Home"></a></li>
        <li><a href="/teka-teki"><img src="pictures/navbar/teka-teki.png" alt="Home"></a></li>
      </ul>
    </nav>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    {{-- main --}}
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
      {{-- head --}}
      <div class="head text-center">
        <img src="{{ url('pictures/profile/team.png') }}" alt="" class="img-fluid" style="max-height: 250px">
        <h2 class="subh my-3">Developed by Team A4</h2>
      </div>
      {{-- gambar --}}
      <div class="profile row row-cols-2 row-cols-md-4 justify-content-center align-items-center gx-5 text-center">
        <div class="p1">
          <img src="{{ url('pictures/profile/p1.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Adinda</h4>
          <h4>Dinia Alexandra</h4>
        </div>
        <div class="p2">
          <img src="{{ url('pictures/profile/p2.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Ahfaz</h4>
          <h4>Zein Azzidan</h4>
        </div>
        <div class="p3">
          <img src="{{ url('pictures/profile/p3.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Aisyah</h4>
          <br>
        </div>
        <div class="p4">
          <img src="{{ url('pictures/profile/p4.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Alvalen</h4>
          <h4>Shafelbilyunazra</h4>
        </div>
      </div>
      {{-- kembali btn --}}
      <div class="mt-4">
        <a href="/" role="button" type="button" class="buthon p-2">Kembali</a>
      </div>

    </div>
  </section>

  {{-- script --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  {{-- jq --}}
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  {{-- paralax --}}
  <script src="{{ url('js/parallax.js') }}"></script>
  <script>
    // hide navbar, then reveal on scroll
    $(document).ready(function() {
      var lastScrollTop = 0;
      $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > lastScrollTop) {
          $('#navbar').addClass('scrolled')

        } else {
          $('#navbar').removeClass('scrolled');
        }
        lastScrollTop = scrollTop;
      });
    });

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
