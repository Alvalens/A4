@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
  <link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/games/coloron.css') }}">
    <style>
    footer {
      display: none;
    }
  </style>
@endsection

@section('content')


  <section>
      <div class="tombol">
    <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
      <i class="fa-solid fa-reply"></i></a>
  </div>
  <div class="splash"></div>
  <div class="containerc">

    <div class="start-game game-full-flex" id="start-game">

      <div class="start-game-top"><a class="play-full-page" href="https://codepen.io/gregh/full/yVLOyO/"
          target="_blank">Full
          Page Mode</a></div>

      <div class="logo-holder">
        <p class="logo">
          <span>C</span>
          <span>o</span>
          <span>l</span>
          <span>o</span>
          <span>r</span>
          <span>o</span>
          <span>n</span>
        </p>
        <a class="play-button" href="#" onclick="game.start()">Play</a>
        <h4 class="hint">hint: <span>red</span> color always comes first</h4>
      </div>

      <div class="how-to-play">
        <div class="section section-1">
          <h4>Bouncing ball<br>changes color</h4>
          <div class="content">
            <div class="ball-demo" id="ball-demo"></div>
          </div>
        </div>
        <div class="section section-2">
          <h4>Tap on the bar to switch the colors<br>(Red, Yellow, Purple)</h4>
          <div class="content">
            <div class="bar bar-1" data-index="0"></div>
            <div class="bar bar-2"></div>
            <div class="bar bar-3"></div>
          </div>
        </div>
        <div class="section section-3">
          <h4>Always match the<br>ball and bar colors</h4>
          <div class="content">
            <div class="ball-demo" id="ball-demo"></div>
            <div class="bar bar-1"></div>
          </div>
        </div>
      </div>

    </div>

    <div class="stop-game game-full-flex">

      <div class="score-containerc">

        <h1>Coloron</h1>

        <div class="final-score"></div>
        <div class="result"></div>

        <h4>Tweet to challenge friends</h4>

        <p>
          <a class="tweet" href="#" onclick="game.generateTweet()">
            <i class="fa fa-twitter" aria-hidden="true"></i> Tweet
          </a>
        </p>

        <div>
          <a class="play-again" href="#" onclick="game.start()">Play Again</a>
          <a class="main-menu" href="#" onclick="game.intro()">Menu</a>
        </div>

      </div>

    </div>

    <div class="small-glows"></div>

    <div class="glow">
      <div class="sun"></div>
    </div>

    <div class="waves">
      <div class="top_wave"></div>
      <div class="wave1"></div>
      <div class="wave2"></div>
      <div class="wave3"></div>
      <div class="wave4"></div>
    </div>

    <div class="mounts">
      <div class="mount1"></div>
      <div class="mount2"></div>
    </div>

    <div class="clouds"></div>

    <div class="scene">
      <div class="learn-to-play">Click on the bars to change the color!</div>
      <div class="score" id="score"></div>
      <div class="ball-holder"></div>
      <div class="sticks" id="sticks"></div>
    </div>

    <div class="noise"></div>

  </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
  <script src="{{ url('assets/js/games/coloron.js') }}"></script>
@endsection
