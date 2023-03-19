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
    font-size: 20px;
    color: #2f9400;
  }

  .desc {
    font-size: 15px;
    color: #4b4b4b;
    text-align: justify;
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
    background-color: #caa451;
    /* make it round */
    border-radius: 50%;
    /* size */
    width: 50px;
    height: 50px;
    position: fixed;
    bottom: 0;
    left: 50%;
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




</style>

<body style="overflow-x: hidden">
  <section data-bss-parallax-bg="true" style="background: url('pictures/bg.jpg'); background-size: cover;" class="vh-100">
    {{-- main  --}}
    <div class="container">

    </div>
  </section>
  {{-- create a fixed button in the middle bottom functionm to scroll down --}}
<div class=" text-center">
  <a href="#scroll-down" class="btn-down">
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
    section2.scrollIntoView({ behavior: 'smooth' });
  });

  </script>
</body>

</html>
