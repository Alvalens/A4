@extends('layout.master')
@section('title', 'Yuk, Belajar!')

<link rel="stylesheet" href="{{ url('assets/css/belajar.css') }}">

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

<style>
  .book {
    position: relative;
    border-radius: 50%;
    width: 200px;
    height: 200px;
    background-color: whitesmoke;
    -webkit-box-shadow: 1px 1px 12px #000;
    box-shadow: 1px 1px 12px #000;
    -webkit-transform: preserve-3d;
    -ms-transform: preserve-3d;
    transform: preserve-3d;
    -webkit-perspective: 2000px;
    perspective: 2000px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    color: #000;
  }

  .cover {
    top: 0;
    position: absolute;
    background-color: rgb(103, 198, 230);
    width: 100%;
    height: 100%;
    border-radius: 50%;
    cursor: pointer;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    -webkit-transform-origin: 0;
    -ms-transform-origin: 0;
    transform-origin: 0;
    -webkit-box-shadow: 1px 1px 12px #000;
    box-shadow: 1px 1px 12px #000;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
  }

  .book:hover .cover {
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    -webkit-transform: rotatey(-80deg);
    -ms-transform: rotatey(-80deg);
    transform: rotatey(-80deg);
  }

  p {
    padding-top: 20px;
    font-size: 20px;
    font-weight: bolder;
  }

  a:link {
    text-decoration: none !important;
    color: black;
  }
.outer {
  font-family: 'Irish Grover', sans-serif;
  font-size: 25px;
  font-weight: bolder;
}
.inner {
  font-family: 'Irish Grover', sans-serif;
  font-size: 25px;
  font-weight: bolder;
  text-decoration: none !important;
}
</style>
@section('content')
  <section class="mt-0 mt-md-5">

  </section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2 ">
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




  {{-- jq --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
  <script></script>


@endsection
