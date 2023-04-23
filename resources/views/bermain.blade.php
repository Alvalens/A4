@extends('layout.master')
@section('title', 'Bermain itu Seru!')

<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">

@section('body-style')
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%), url(assets/img/bg.jpg);
  background-size: cover;
  justify-content: center;
  align-items: center;
  --wall-color: var(--color-default);
  --joystick-color: black;
  --joystick-head-color: var(--color-secondary);
  --ball-color: #f06449;
@endsection

@section('content')

  <section class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <a href="{{ route('beranda') }}">
      <img id="ikon-rumah" src="{{ url('assets/img/ikon-rumah.png') }}" alt="Ikon Rumah">
    </a>

    <div class="book">
      <div class="button-group">
        <a href="{{ url('/maze') }}" class="btn-book mt-4 d-flex justify-content-center" name="maze">Maze</a>
      </div>
      <div class="cover">
        <div class="image-group d-flex justify-content-center">
          <img src="{{ url('assets/img/level1.png') }}" width="90%">
        </div>
      </div>
    </div>
    
    <div class="book">
      <div class="button-group">
        <a href="{{ url('/puzzle') }}" class="btn-book mt-4 d-flex justify-content-center" name="puzzle">Puzzle</a>
      </div>
      <div class="cover">
        <div class="image-group d-flex justify-content-center">
          <img src="{{ url('assets/img/level2.png') }}" width="90%">
        </div>
      </div>
    </div>
  </section>

@endsection