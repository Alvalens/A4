@extends('layout.master')
@section('title', 'Bermain itu Seru!')

{{-- css bermain --}}
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
<a href="{{ url('/bermain') }}"><img id="ikon-rumah" src="{{ url('assets/img/ikon-rumah.png') }}" alt="Ikon Rumah"></a>
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
      <span id="move">Move: 100</span>
      <span id="time">Time: 100</span>
    </div>
  </div>
</section>

<script src="assets/js/bermain.js"></script>
<script src="assets/js/bermain2.js"></script>

@section('js', 'bermain')
@endsection