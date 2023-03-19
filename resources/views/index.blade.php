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
  <link rel="stylesheet" href="{{ url('css/nav.css') }}">
  {{-- font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
  {{-- icon --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .navbar {
    background-color: #add8e683;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  }

  .cardf {
    background-color: #DBF2FA;
    height: 50px;
  }

  .cardf2 {
    background-color: #DBF2FA;
    height: 40px;
    width: 80%;
    border-radius: 20px
  }

  .cardf3 {
    background-color: #DBF2FA;
    height: 70px;
    width: 70%;
    border-radius: 40px
  }

  .cardf4 {
    background-color: #DBF2FA;
    height: 30px;
    width: 50%;
    border-radius: 20px
  }

  .subh {
    font-size: 20px;
    color: #2f9400;
  }

  .desc {
    font-size: 15px;
    color: #4b4b4b;
    text-align: justify;
  }

  /* anim */
  .img-main {
    animation: moveUpDown 4s ease-in-out infinite alternate;
  }

  @keyframes moveUpDown {
    0% {
      transform: translateY(0);
    }

    100% {
      transform: translateY(-20px);
    }
  }

  .buthon {
    background-color: #50b68f;
    color: white;
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 20px;
    font-family: 'Potta One', cursive;
    text-decoration: none;
    transition: all 0.5s ease;
  }

  .buthon:hover {
    background-color: #2f940000;
    color: #50b68f;
  }

  .buthon2 {
    /* revrse before use outline  */
    background-color: #50b68f00;
    color: #50b68f;
    border-radius: 20px;
    padding: 10px 20px;
    font-size: 20px;
    font-family: 'Potta One', cursive;
    outline: #50b68f solid 2px;
    text-decoration: none;
    transition: all 0.5s ease;
  }

  .buthon2:hover {
    background-color: #50b68f;
    color: white;
  }

  .btn-down {
    /* color */
    background-color: #50b68f;
    /* make it round */
    border-radius: 50%;
    /* size */
    width: 50px;
    height: 50px;
    position: fixed;
    bottom: 0;
    left: 49%;
    transform: translateX(-50%);
    animation: moveUpDown 4s ease-in-out infinite alternate;
  }
  .btn-down i {
    font-size: 30px;
    color: white;
    /* center */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  /* s2 */
  #navbar {
    transition: top 0.3s ease-in-out;
  }

  #navbar.navbar-hide {
    top: -100px;
  }
  .carousel-item {
  text-align: center;
}

</style>

<body style="overflow-x: hidden">
  <section data-bss-parallax-bg="true" style="background: url('pictures/bgi.jpg'); background-size: cover;" class="vh-100">
    {{-- clouds --}}
    <div class="clouds">
      <div class="container-fluid">
        {{-- c1 --}}
        <div class="row mb-3">
          <div class="col p-0">
            <div class="card cardf">
            </div>
          </div>
          <div class="col">
            <div class="card cardf">
            </div>
          </div>
          <div class="col p-0">
            <div class="card cardf">
            </div>
          </div>
        </div>
        {{-- c2 --}}
        <div class="row mb-2">
          <div class="col p-0">
            <div class="card cardf2" style="margin-left: -15px">
            </div>
          </div>
          <div class="col">
          </div>
          <div class="col p-0 d-flex flex-column justify-content-end align-items-end">
            <div class="card cardf2 " style="margin-right: -15px">
            </div>
          </div>
        </div>
        {{-- c3 --}}
        <div class="row mb-2">
          <div class="col p-0">
            <div class="card cardf3" style="margin-left: -20px">
            </div>
          </div>
          <div class="col">
          </div>
          <div class="col p-0 d-flex flex-column justify-content-end align-items-end">
            <div class="card cardf3 " style="margin-right: -20px">
            </div>
          </div>
        </div>
        {{-- c4 --}}
        <div class="row">
          <div class="col p-0">
            <div class="card cardf4" style="margin-left: -15px">
            </div>
          </div>
          <div class="col">
          </div>
          <div class="col p-0 d-flex flex-column justify-content-end align-items-end">
            <div class="card cardf4" style="margin-right: -15px">
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- main  --}}
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          {{-- gambar --}}
          <div class="img text-center">
            <img src="{{ url('pictures/h1.png') }}" alt="" class="img-fluid" style="max-height:400px;">
          </div>
          {{-- sub h --}}
          <div class="subh">
            <p class="text-center">(Aksesibilitas, Atraktif, Antusias, Akademik)</p>
          </div>
          {{-- desc --}}
          <div class="desc px-md-5 mx-md-5 p-0 m-0">
            <p>Platform media pembelajaran interaktif dengan game-based education dan trivia berbasis website untuk anak
              tunagrahita ringan, memiliki mengedepankan pada aksesibiltas, atraktif, dan antusias akademik.</p>
          </div>
          {{-- button --}}
          <div class="button text-center">
            <a href="lojin" type="button" class="buthon mx-3"> Mulai!</a>
            <a href="/about" type="button" class="buthon2"> lebih lanjut</a>

          </div>
        </div>
        <div class="col-md-6">
          {{-- main img --}}
          <div class="img-main text-center">
            <img src="{{ url('pictures/pensilterbang.png') }}" alt="pensil" draggable="false" class="img-fluid" style="height:700px; ">
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- create a fixed button in the middle bottom functionm to scroll down --}}
<div class=" text-center">
  <a class="btn-down">
    <i class="fa-solid fa-arrow-down"></i>
  </a>
</div>

  {{-- hal 2 --}}

  <section style="background: url('pictures/bg.jpg'); background-size: cover;"
    class="vh-100 d-flex" id="section2">
    {{-- nav --}}
      <nav id="navbar" class="navbar fixed-top">
        <ul class="menu">
          <li><a href="#services"><img src="pictures/navbar/beranda.png" alt="Home"></a></li>
          <li><a href="#services"><img src="pictures/navbar/belajar.png" alt="Home"></a></li>
          <li><a href="#services"><img src="pictures/navbar/bermain.png" alt="Home"></a></li>
          <li><a href="#services"><img src="pictures/navbar/teka-teki.png" alt="Home"></a></li>
        </ul>
      </nav>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    {{-- main --}}
<div class="container d-flex flex-column justify-content-center align-items-center h-100">
  <div class="row d-flex flex-column justify-content-center align-items-center" >
    {{-- head --}}
    <img src="{{ url('pictures/h11.png') }}" alt="" class="img-fluid">
    {{-- carousel  --}}
    <div class="col">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ url('pictures/1.png') }}" class="img-fluid text-center" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ url('pictures/1.png') }}" class="img-fluid text-center" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ url('pictures/1.png') }}" class="img-fluid text-center" alt="...">
          </div>
        </div>
        {{-- btn --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prevs-icon" style="font-size: 8rem" aria-hidden="true"><</span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-nexst-icon" style="font-size: 8rem"aria-hidden="true">></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</div>

  </section>

  {{-- script --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  {{-- jq --}}
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  {{-- paralax --}}
  <script src="{{ url('js/parallax.js') }}"></script>
  <script>
    // hide navbar, then reveal on scroll
    $(document).ready(function() {
      var lastScrollTop = 0;
      $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > lastScrollTop) {
          $('#navbar').slideDown('slow');

        } else {
          $('#navbar').slideUp('slow');
        }
        lastScrollTop = scrollTop;
      });
    });

    // hide btn-down on scroll
    $(document).ready(function() {
      var lastScrollTop = 0;
      $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > lastScrollTop) {
           $('.btn-down').fadeOut('slow');

        } else {
$('.btn-down').fadeIn('slow');

        }
        lastScrollTop = scrollTop;
      });
    });
    // make btn-down scroll to the next section
    const btnDown = $('.btn-down');
    const section2 = document.getElementById('section2');

  btnDown.on('click', () => {
    section2.scrollIntoView({ behavior: 'smooth' });
  });

  </script>
</body>

</html>
