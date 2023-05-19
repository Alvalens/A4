@extends('layout.master')
@section('title', 'Bermain itu Seru!')

@section('css')
<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
@endsection

@section('body-style')
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%);
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

    <div class="game">
      <div class="grid">
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button>5</button>
        <button>6</button>
        <button>7</button>
        <button>8</button>
        <button></button>
      </div>

      <div class="footer">
        <button>Play</button>
        <span id="move">Gerak: 100</span>
        <span id="time">Waktu: 100</span>
      </div>
    </div>

  </section>

@endsection

@section('js')

<script src="{{ url('assets/js/bermain.js') }}"></script>
@endsection