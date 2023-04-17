@extends('layout.master')
@section('title', 'Tentang')

@section('css')
  <style>
    h1, h2, h3, h4, h5{
      font-family: 'Fredoka One';
      color: white !important;
      text-shadow: #d8aa47 3px 0 10px;
      letter-spacing: 1px;
    }
    .buthon {
      background-color: #d8aa47;
      color: white;
      border-radius: 10px;
      font-size: 30px;
      font-family: 'Fredoka One';
      text-shadow: #8b723c 3px 0 10px;
      text-decoration: none;
      transition: all 0.5s ease;
    }
    .buthon:hover {
      background-color: #2f940000;
      color: #a3964e;
      text-shadow: white 3px 0 10px;
    }
    @media (max-width: 576px) {
      img {
        width: 70%;
      }
      .img-title {
        margin-top: 30px;
      }
    }
  </style>
@endsection

@section('body-style')
  background-image: url({{ url('assets/img/bg-desert1.png') }});
  background-repeat: no-repeat;
  background-size: cover;
  overflow: hidden;
@endsection

@section('content')
  <section class="vh-100 d-flex" id="section2">
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
      
      <div class="head text-center">
        <img src="{{ url('assets/img/profile/title-ourteam.png') }}" alt="" class="img-fluid img-title" style="max-height: 150px">
        <h2 class="subh my-3">Dikembangkan oleh Team A4</h2>
      </div>
      
      <div class="profile row row-cols-2 row-cols-md-4 justify-content-center align-items-center text-center">
        <div class="p1">
          <img src="{{ url('assets/img/profile/p1.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Adinda</h4>
          <h4>Dinia Alexandra</h4>
        </div>
      
        <div class="p2">
          <img src="{{ url('assets/img/profile/p2.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Ahfaz</h4>
          <h4>Zein Azzidan</h4>
        </div>
      
        <div class="p3">
          <img src="{{ url('assets/img/profile/p3.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Aisyah</h4>
          <br>
        </div>
      
        <div class="p4">
          <img src="{{ url('assets/img/profile/p4.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Alvalen</h4>
          <h4>Shafelbilyunazra</h4>
        </div>
      
      </div>
      <div class="mt-4">
        <a href="/" role="button" type="button" class="buthon p-2">Kembali</a>
      </div>
    </div>
  </section>

@section('js')
  <!-- SCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ url('js/parallax.js') }}"></script>
  <!-- SCRIPT -->
@endsection