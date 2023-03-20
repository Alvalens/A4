@extends('layout.master')
@section('title', 'Tentang')
@section('css', 'belajar')

@section('content')
  {{-- hal 2 --}}
<style>
    .buthon {
    background-color: #d8aa47;
    color: white;
    border-radius: 20px;
    padding: 10px 22px;
    font-size: 20px;
    font-family: 'Potta One', cursive;
    text-decoration: none;
    transition: all 0.5s ease;
  }

  .buthon:hover {
    background-color: #2f940000;
    color: #e0c734;
  }

</style>
  <section style="background: url('pictures/bgdes.png'); background-size: cover;" class="vh-100 d-flex" id="section2">
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

@endsection
