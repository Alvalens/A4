<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Title -->
  <title>@yield('title', 'Beranda')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/@yield('css', 'main').css" rel="stylesheet">

  {{-- icon --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Make Body CSS Style -->
  <style>
    #navbar {
      transition: top 0.3s ease-in-out;
    }

    .navbar {
      background-color: #add8e683;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    #navbar.navbar-hide {
      top: -100px;
    }
    body {
      @yield('body-style')
    }
  </style>

</head>

<body>
    {{-- navbar s --}}
  <nav class="navbar navbar-expand-md fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="navbarNavLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex justify-content-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <img src="pictures/navbar/beranda.png" alt="Home">
                <span class="caption d-block d-md-none">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/belajar">
                <img src="pictures/navbar/belajar.png" alt="Belajar">
                <span class="caption d-block d-md-none">Belajar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bermain">
                <img src="pictures/navbar/bermain.png" alt="Bermain">
                <span class="caption d-block d-md-none">Bermain</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/teka-teki">
                <img src="pictures/navbar/teka-teki.png" alt="Teka-teki">
                <span class="caption d-block d-md-none">Teka-teki</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/guru">
                <img src="assets/img/navbar/edit.png" alt="" style="height: 32px">
                <span class="caption d-block d-md-none">Guru</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
      {{-- cicrle account icon --}}
      <div class="d-flex justify-content-center align-items-center profile">
        <div class="circle rounded-circle">
          <i class="fas fa-user"></i>
        </div>
      </div>
  </nav>

  @section('content')

  @show

  {{-- footer --}}
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <footer>
    <div class="text-center p-3">
      © 2023 Copyright:
      <p><strong>A4 Team | S1 TI A | Universitas Negeri Malang</strong></p>
    </div>
    <!-- Copyright -->
  </footer>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/@yield('js', 'main').js"></script>

  {{-- jq --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  {{-- navbar --}}

  <script>
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
  </script>
</body>

</html>
