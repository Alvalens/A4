@extends('layout.master')
@section('title', 'Yuk, Belajar!')
@section('css', 'belajar')

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

<style>
  .card {
    color: black;
    text-decoration: none;

    position: relative;
    width: 220px;
    height: 320px;
    background: mediumturquoise;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    font-weight: bold;
    border-radius: 15px;
    cursor: pointer;
    min-height: 220px;
  }

  .card::before,
  .card::after {
    position: absolute;
    content: "";
    width: 20%;
    height: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    font-weight: bold;
    background-color: lightblue;
    transition: all 0.5s;
  }

  .card::before {
    top: 0;
    right: 0;
    border-radius: 0 15px 0 100%;
  }

  .card::after {
    bottom: 0;
    left: 0;
    border-radius: 0 100% 0 15px;
  }

  .card:hover::before,
  .card:hover:after {
    width: 100%;
    height: 100%;
    border-radius: 15px;
    transition: all 0.5s;
  }

  .card:hover:after {
    color: black;
    text-decoration: none;
    content: "Mulai!";
  }
a:link {
  text-decoration: none !important;
  color: black;
}
.card p {
  text-decoration: none !important;
  color: black;
}
</style>
@section('content')
  <section>

  </section>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2 ">
      @for ($level = 1; $level <= $lastLevel; $level++)
      <div class="wrapper d-flex flex-column justify-content-center align-items-center">
        <a href="{{ route('materi', ['level' => $level]) }}">
          <div class="card rounded-circle">
            <p>Bagian {{ $level }}</p>
          </div>
        </a>
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
