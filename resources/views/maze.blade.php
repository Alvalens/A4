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
  <div id="game1">
    <div id="center">
      <div id="game">
        <div id="maze">
          <div id="end"></div>
        </div>
        <div id="joystick">
          <div class="joystick-arrow"></div>
          <div class="joystick-arrow"></div>
          <div class="joystick-arrow"></div>
          <div class="joystick-arrow"></div>
          <div id="joystick-head"></div>
        </div>
        <div id="note">
        </div>
      </div>
    </div>
  </div>
</section>

<script src="assets/js/bermain.js"></script>
<script src="assets/js/bermain2.js"></script>

@section('js', 'bermain')
@endsection