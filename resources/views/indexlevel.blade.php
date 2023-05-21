@extends('layout.master')

@section('title', 'Yuk, Belajar!')

@section('css')
<link rel="stylesheet" href="{{ url('assets/css/belajar.css') }}">

@endsection
@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

@section('content')
  <section class="mt-0 mt-md-5">

  </section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-3 my-2 ">
      @for ($level = 1; $level <= $lastLevel; $level++)
      <div class="wrap d-flex flex-column justify-content-center align-items-center">
        <div class="book">
          <a href="{{ route('materi', ['level' => $level]) }}">
            <p class="inner">Mulai!</p>
          </a>
          <div class="cover">
            <p class="outer">Bagian {{ $level }}</p>
          </div>
        </div>
    </div>
      @endfor
    </div>
  </div>


@endsection
