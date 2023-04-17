@extends('layout.masterg')
@section('title', 'Bermain itu Seru!')
@section('css', 'guru')

@section('content')
<style>

  .tex {
    font-family: 'Potta One', cursive;
    color: brown;
    font-size: 50px;
    /* set outline for the text */
    text-stroke: 1px white;
    -webkit-text-stroke: 2px white;

  }

  .col img {
    transition: transform 0.3s ease-in-out;
  }

  .col img:hover {
    transform: scale(1.1);
  }
  .butn {
    font-family: 'Potta One', cursive;
    background-color: #add8e683;
    border: none;
    border-radius: 10px;
    color: rgb(46, 46, 46);
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }
  .butn:hover {
    /* chanmge colotr and zxoom */
    background-color: #ffffff;
    color: rgb(46, 46, 46);
    transform: scale(1.1);
  }
</style>

<body>
  <section style="background: url('pictures/bg.jpg'); background-size: cover; padding-top: 80px;"
    class="vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="container">
      <div class="row">
        <h1 class="text-center tex">Menu</h1>
        <div class="col">
          <a href="/gurubelajar">
          <img src="{{ url('/pictures/f1.png') }}" alt="">
          </a>
        </div>
        <div class="col">
          <a href="raport">
          <img src="{{ url('/pictures/f2.png') }}" alt="">
          </a>
        </div>
        {{-- logout button --}}
        <div class="button my-3 text-center">
          <a href="{{ url('/logout') }}" class="butn">Logout</a>
        </div>
      </div>
    </div>
  </section>

  {{-- script --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    @endsection