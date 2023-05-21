@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
<meta name="viewport" content="width=device-width,user-scalable=no">
<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/games/tower.css') }}">
@endsection

@section('content')
<section>
    <div class="tombol">
    <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
      <i class="fa-solid fa-reply"></i></a>
  </div>
<div id="container">
	<div id="game"></div>
	<div id="score">0</div>
	<div id="instructions">Klik (atau tekan spacebar) untuk meletakkan balok</div>
	<div class="game-over">
		<h2>Game Over</h2>
		<p>Kerja bagus!.</p>
		<p>Klik atau spacebar untuk mulai</p>
	</div>
	<div class="game-ready">
		<div id="start-button">Mulai</div>
		<div></div>
	</div>
</div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r83/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="{{ url('assets/js/games/tower.js') }}"></script>
@endsection
