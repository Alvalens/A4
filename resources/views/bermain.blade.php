@extends('layout.master')
@section('title', 'Bermain itu Seru!')

<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">

@section('body-style')
  background: linear-gradient(to top, rgba(0, 0, 0, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%),
  url(assets/img/bg.jpg);
  background-size: cover;
  justify-content: center;
  align-items: center;
  --wall-color: var(--color-default);
  --joystick-color: black;
  --joystick-head-color: var(--color-secondary);
  --ball-color: #f06449;
@endsection

@section('content')
  <style>
    .containerC {
      display: flex;
      justify-content: center;
      align-items: center;

      margin: 10vmin;
      overflow: hidden;
      transform: skew(5deg);
    }

    .containerC .cardc {
      flex: 1;
      transition: all 1s ease-in-out;
      height: 75vmin;
      position: relative;
    }

    .containerC .cardc .cardc__head {
      color: black;
      background: rgba(30, 199, 255, 0.75);
      padding: 0.5em;
      transform: rotate(-90deg);
      transform-origin: 0% 0%;
      transition: all 0.5s ease-in-out;
      min-width: 100%;
      text-align: center;
      position: absolute;
      bottom: 0;
      left: 0;
      font-size: 1em;
      white-space: nowrap;
    }

    .containerC .cardc:hover {
      flex-grow: 10;
    }

    .containerC .cardc:hover img {
      filter: grayscale(0);
    }

    .containerC .cardc:hover .cardc__head {
      text-align: center;
      top: calc(100% - 2em);
      color: white;
      background: rgba(0, 0, 0, 0.057);
      font-size: 2em;
      transform: rotate(0deg) skew(-5deg);
    }

    .containerC .cardc img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: all 1s ease-in-out;
      filter: grayscale(100%);
    }

    .containerC .cardc:not(:nth-child(5)) {
      margin-right: 1em;
    }

    @media (max-width: 900px) {
      section {
        margin-top: 30px;
      }

      img {
        margin-left: 5px;
      }

      .containerC .cardc .cardc__head {
        transform: rotate(0deg);
      }

      .containerC {
        padding: 0 20px 0 20px;
        flex-wrap: wrap;
        margin: 10vmin 0;
        transform: skew(0)
      }

      .containerC .cardc {
        flex-basis: calc(50% - 0.5em);
        height: 50vmin;
        margin-right: 0;
        margin-bottom: 1em;
        transform: skew(0);
        border-radius: 0;
      }

      .containerC .cardc:nth-child(odd) {
        margin-right: 1em;
      }

      .containerC .cardc__head {
        transform: none;
        position: relative;
        top: auto;
        left: auto;
        font-size: 1.5em;
        padding: 0.75em;
        min-width: 1% !important;
        text-align: center;
        background: rgba(30, 199, 255, 0.75);
        color: black;
        white-space: normal;
      }

      .containerC .cardc img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        filter: grayscale(0%);
      }
    }
  </style>
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
