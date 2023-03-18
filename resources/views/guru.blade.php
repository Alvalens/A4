<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- css --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  {{-- font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
</head>
<style>
  .navbar {
    background-color: #add8e683;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  }

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
  {{-- nav --}}
  <nav class="navbar navbar-expand-lg navbar-light fixed-top mx-5 mt-1">
    <div class="container">
      <a class="navbar-brand mx-auto" href="#">Home</a>
      <a class="navbar-brand mx-auto" href="#">Halaman guru</a>
    </div>
  </nav>

  <section style="background: url('pictures/bg.jpg'); background-size: cover; padding-top: 80px;"
    class="vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="container">
      <div class="row">
        <h1 class="text-center tex">Menu</h1>
        <div class="col">
          <img src="{{ url('/pictures/f1.png') }}" alt="">
        </div>
        <div class="col">
          <img src="{{ url('/pictures/f2.png') }}" alt="">
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

  <script>
    // add class scrolled to navbar wehn page is scrolled
  </script>
</body>

</html>
