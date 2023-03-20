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
  <nav id="navbar" class="navbar fixed-top">
    <ul class="menu">
      <li><a href="#services"><img src="pictures/navbar/beranda.png" alt="Home"></a></li>
      <li><a href="#services"><img src="pictures/navbar/belajar.png" alt="Home"></a></li>
      <li><a href="#services"><img src="pictures/navbar/bermain.png" alt="Home"></a></li>
      <li><a href="#services"><img src="pictures/navbar/teka-teki.png" alt="Home"></a></li>
    </ul>
  </nav>
  @section('content')

  @show



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
