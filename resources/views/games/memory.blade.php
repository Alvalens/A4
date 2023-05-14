@extends('layout.master')
@section('title', 'Bermain itu Seru!')


@section('content')
  <link rel="stylesheet" href="{{ url('assets/css/games/memory.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Coda">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  <style>
    .tombol-terbang {
      position: fixed;
      bottom: 50px;
      right: 20px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #2872b8;
      color: #fff;
      font-size: 20px;
      text-align: center;
      line-height: 50px;
      box-shadow: 0 0 6px rgba(0, 0, 0, 0.329);
      transition: all 0.3s ease;
      z-index: 99999;
    }
    .fa-reply {
      margin-top: 16px;
    }
  </style>
  <section>
      <div class="tombol">
    <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
      <i class="fa-solid fa-reply"></i></a>
  </div>
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
