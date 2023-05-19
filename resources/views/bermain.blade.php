@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
@endsection

@section('body-style')
  background: linear-gradient(to top, rgba(0, 0, 0, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%),
  url(assets/img/bg.jpg);
  background-size: cover;
  justify-content: center;
  align-items: center;
@endsection

@section('content')
  <section class="d-flex flex-column justify-content-center align-items-center">
    <div class="containerC">
      <div class="cardc">
        <a href="{{ route('puzzle') }}">
          <img src="{{ url('assets/img/games/puzzle.png') }}">
          <div class="cardc__head">Puzzle</div>
        </a>
      </div>
      <div class="cardc">
        <a href="{{ route('memory') }}">
          <img src="{{ url('assets/img/games/memory.png') }}">
          <div class="cardc__head">Memory</div>
        </a>
      </div>
      <div class="cardc">
        <a href="{{ route('coloron') }}">
          <img src="{{ url('assets/img/games/coloron.png') }}">
          <div class="cardc__head">Coloron</div>
        </a>
      </div>
      <div class="cardc">
        <a href="{{ route('tower') }}">
          <img src="{{ url('assets/img/games/tower.png') }}">
          <div class="cardc__head">Tower Block</div>
        </a>
      </div>
      <div class="cardc">
        <a href="{{ route('menja') }}">
          <img src="{{ url('assets/img/games/menja.jpg') }}">
          <div class="cardc__head">Menja</div>
        </a>
      </div>
    </div>
  </section>

@endsection
