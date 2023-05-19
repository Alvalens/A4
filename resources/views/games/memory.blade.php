@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
  <link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/games/memory.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Coda">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">

  <style>
    /* when on md and lower scale section to 0.5 */
    @media (max-width: 991px) {
      section {
        transform: scale(0.5);
      }
    }
  </style>
@endsection

@section('content')
  <div class="tombol">
    <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
      <i class="fa-solid fa-reply"></i></a>
  </div>
  <section>
    <div id="score-panel">
      <ul class="stars">
        <li><i class="fa fa-star"></i></li>
        <li><i class="fa fa-star"></i></li>
        <li><i class="fa fa-star"></i></li>
      </ul>
      <span class="moves">0</span> Moves
      <div class="restart">
        <i class="fa fa-repeat"></i>
      </div>
    </div>
    <ul class="deck"></ul>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.js"></script>
  <script src="{{ url('assets/js/games/memory.js') }}"></script>
@endsection
