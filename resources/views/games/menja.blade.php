@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/games/menja.css') }}">
@endsection

@section('content')


  <section class="pt-5">
    <div class="tombol d-flex justify-content-center align-content-center">
      <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
        <i class="fa-solid fa-reply"></i></a>
    </div>
    <!-- Game canvas -->
    <canvas id="c"></canvas>

    <!-- Gameplay HUD -->
    <div class="hud">
      <div class="hud__score">
        <div class="score-lbl"></div>
        <div class="cube-count-lbl"></div>
      </div>
      <div class="pause-btn">
        <div></div>
      </div>
      <div class="slowmo">
        <div class="slowmo__bar"></div>
      </div>
    </div>

    <!-- Menu System -->
    <div class="menus">
      <div class="menu menu--main">
        <h1>MENJA</h1>
        <button type="button" class="play-normal-btn">PLAY GAME</button>
        <button type="button" class="play-casual-btn">CASUAL MODE</button>
        <div class="credits">An 8kB game by <a href="https://cmiller.tech">Caleb Miller</a></div>
      </div>
      <div class="menu menu--pause">
        <h1>Paused</h1>
        <button type="button" class="resume-btn">RESUME GAME</button>
        <button type="button" class="menu-btn--pause">MAIN MENU</button>
      </div>
      <div class="menu menu--score">
        <h1>Game Over</h1>
        <h2>Your Score:</h2>
        <div class="final-score-lbl"></div>
        <div class="high-score-lbl"></div>
        <button type="button" class="play-again-btn">PLAY AGAIN</button>
        <button type="button" class="menu-btn--score">MAIN MENU</button>
      </div>
    </div>
  </section>
  <script src="{{ url('assets/js/games/menja.js') }}"></script>
@endsection
