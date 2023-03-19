<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="height=device-height, initial-scale=1.0">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .navbar {
    transition: all 0.3s ease-in-out;
  }

  .navbar.scrolled {
    background-color: #add8e683;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin: 20px 30px 0 30px;
    border-radius: 30px;
    transition: all 0.3s ease-in-out;
  }

  .subh {
    font-size: 30px;
    color: #e0b746;
    font-family: 'Potta One', cursive;
    /* white outline */
  }

  .desc {
    font-size: 18px;
    color: #4b4b4b;
    text-align: justify;
    line-height: 2;
  }

  /* on sm set font of desc smaller and remove line heighr */
  @media (max-width: 576px) {
    .desc {
      font-size: 15px;
      line-height: 1;
    }
  }

  .cardd {
    border-radius: 40px;
  }

  @keyframes moveUpDown {
    0% {
      transform: translateY(0);
    }

    100% {
      transform: translateY(-20px);
    }
  }

  .btn-down {
    /* color */
    background-color: #d8b872;
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
    color: rgb(112, 77, 0);
    /* center */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .profile {
    font-family: 'Potta One', cursive;
    font-size: 30px;
    color: #e0b746;
    /* white outline */
    -webkit-text-stroke: 1px #9e896e;
  }

  .buthon {
    font-family: 'Potta One', cursive;
    font-size: 20px;
    color: #ffffff;
    /* bgc */
    background-color: #caa451;
    /* make it round */
    border-radius: 10px;
    /* size */
    width: 150px;
    height: 50px;
    /* center the text */
    text-align: center;
    padding-top: 8px;
    text-decoration: none;
  }
</style>

<body style="overflow-x: hidden">
  <section daata-bss-parallax-bg="true" style="background: url('pictures/bg.jpg'); background-size: cover;"
    class="vh-100">
    {{-- main  --}}
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
      {{-- head --}}
      <div class="head text-center">
        <img src="{{ url('pictures/A4.png') }}" alt="" class="img-fluid" style="max-height: 250px">
        <h2 class="subh">(Aksesibilitas, Atraktif, Antusias, Akademik)</h2>
        <div class="card cardd">
          <div class="desc p-4">
            <p class="p-4"><b>A4</b> merupakan website edukasi berbasis game education dan trivia yang dibuat untuk
              membantu anak penyandang tunagrahita ringan. Dengan menggabungkan unsur permainan dan pembelajaran,
              individu akan merasa terlibat dan termotivasi dalam mempelajari materi pelajaran. Salah satu keuntungan
              dari penggunaan media pembelajaran interaktif dengan game-based education dan trivia berbasis web adalah
              meningkatkan motivasi belajar dan partisipasi aktif anak tunagrahita ringan dalam pembelajaran. Anak
              tunagrahita ringan seringkali memiliki keterbatasan dalam konsentrasi dan motivasi, sehingga media
              pembelajaran yang menarik dan interaktif dapat membantu mereka untuk lebih fokus dan terlibat dalam proses
              belajar. Pengembangan media pembelajaran ini ditujukkan sebagai upaya meningkatkan kualitas pembelajaran
              dan membantu anak tunagrahita ringan dalam mencapai potensi terbaiknya.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- fixed button  --}}
  <div class="text-center">
    <a class="btn-down">
      <i class="fa-solid fa-arrow-down"></i>
    </a>
  </div>

  {{-- hal 2 --}}

  <section style="background: url('pictures/bgdes.png'); background-size: cover;" class="vh-100 d-flex" id="section2">
    {{-- nav --}}
    <nav id="navbar" class="navbar fixed-top">
      <ul class="menu">
        <li><a href="/"><img src="pictures/navbar/beranda.png" alt="Home"></a></li>
        <li><a href="/belajar"><img src="pictures/navbar/belajar.png" alt="Home"></a></li>
        <li><a href="/bermain"><img src="pictures/navbar/bermain.png" alt="Home"></a></li>
        <li><a href="/teka-teki"><img src="pictures/navbar/teka-teki.png" alt="Home"></a></li>
      </ul>
    </nav>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    {{-- main --}}
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
      {{-- head --}}
      <div class="head text-center">
        <img src="{{ url('pictures/profile/team.png') }}" alt="" class="img-fluid" style="max-height: 250px">
        <h2 class="subh my-3">Developed by Team A4</h2>
      </div>
      {{-- gambar --}}
      <div class="profile row row-cols-2 row-cols-md-4 justify-content-center align-items-center gx-5 text-center">
        <div class="p1">
          <img src="{{ url('pictures/profile/p1.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Adinda</h4>
          <h4>Dinia Alexandra</h4>
        </div>
        <div class="p2">
          <img src="{{ url('pictures/profile/p2.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Ahfaz</h4>
          <h4>Zein Azzidan</h4>
        </div>
        <div class="p3">
          <img src="{{ url('pictures/profile/p3.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Aisyah</h4>
          <br>
        </div>
        <div class="p4">
          <img src="{{ url('pictures/profile/p4.png') }}" alt="" class="img-fluid" style="max-height:250px;">
          <h4>Alvalen</h4>
          <h4>Shafelbilyunazra</h4>
        </div>
      </div>
      {{-- kembali btn --}}
      <div class="mt-4">
        <a href="/" role="button" type="button" class="buthon p-2">Kembali</a>
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
          $('#navbar').addClass('scrolled')

        } else {
          $('#navbar').removeClass('scrolled');
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
      section2.scrollIntoView({
        behavior: 'smooth'
      });
    });
  </script>
</body>

</html>
