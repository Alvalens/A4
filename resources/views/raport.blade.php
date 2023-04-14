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
  @include('layout.asset')
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Potta+One&display=swap');

  h1,
  h2,
  h3,
  h4,
  h5 {
    /* potta one */
    font-family: 'Potta One', cursive;
  }

  h2 {
    color: #ffffff;
    /* shadow */
    text-shadow: 2px 2px 4px #000000;
  }

  .navbar.scrolled {
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin: 0 0 20px 0;
  }

  /* Change navbar color */
  .navbar {
    background-color: #add8e683;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  }

  .cardr {
    background-color: #ffffff86;
    border-radius: 20px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.26);
    max-width: 550px;
    margin: 0 auto;
  }

  .cardl {
    background-color: #ffffff86;
    border-radius: 20px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.26);
    max-width: 800px;

  }

  .cardl {
    min-width: 700px;
    margin-top: 150px
  }

  @media (max-width: 1024px) {
    .card {
      min-width: auto;
    }

    .cardl {
      margin-top: 0;

    }
  }

  .progress-bar .progress-bar {
    background-color: #00ff00;
  }

  .desc {
    /* align rata kanan */
    text-align: justify;
  }

  .list {
    list-style-type: none;
    font-size: 18px
  }

  ul.list li b {
    position: relative;
    display: inline-block;
    min-width: 180px;
    margin-right: 20px;
  }

  .list b::after {
    content: ":";
    position: absolute;
    right: 10px;
  }

  ul li {
    margin-bottom: 18px;
  }

  ul li:last-child {
    margin-bottom: 40px;
  }
</style>

<body>
  {{-- nav --}}
  <nav class="navbar navbar-expand-lg navbar-light fixed-top mx-5 mt-1">
    <div class="container-fluid">
      <a class="navbar-brand mx-auto" href="#">raport</a>
    </div>
  </nav>

  <section style="background: url('assets/img/bg.jpg'); background-size: cover; padding-top: 80px;" class="vh-100">
    <!-- Your content goes here -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 mt-5 pl-md-5">
          <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-md-end justify-content-center align-items-center">
              <img src="{{ url('pictures/guest.jpg') }}" alt=""
                class="img-fluid rounded-circle align-self-md-end" style="max-height: 200px; max-width:200px;">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-lg-center align-items-start">
              <h2>
                Nama Anak
              </h2>
              <div class="desc">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, voluptatibus praesentium vitae
                  doloremque, animi odit modi dolores minus error unde rem laborum? Aspernatur, provident voluptates
                  dignissimos ad repellat sapiente quasi!
                </p>
              </div>
            </div>
          </div>
          <div class="row mt-4 ml-md-5">
            <div class="col d-flex flex-column justify-content-md-end align-items-md-end">
              <div class="card cardl align-self-lg-end">
                <div class="container">
                  <h4 class="text-center my-4">Informasi</h4>
                  {{-- create a list containing stats with aligned colon --}}
                  <div>
                    <ul class="list">
                      <li><b>Waktu belajar</b><span>999 jam</span></li>
                      <li><b>Materi kesukaan</b><span>Berhitung</span></li>
                      <li><b>Guru pendamping</b><span>Adin S.Pd</span></li>
                      <li><b>Orang Tua</b><span>Aisyah</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 m-2 m-md-0">
          <!-- Carousel section -->
          <div id="raportCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-bs-target="#raportCarousel" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#raportCarousel" data-bs-slide-to="1"></li>
              <li data-bs-target="#raportCarousel" data-bs-slide-to="2"></li>
              <!-- Add more indicators as needed based on your database -->
            </ol>

            <!-- Slides -->
            <div class="carousel-inner">
              <!-- Raport 1 card -->
              <div class="carousel-item active">
                    @include('layout.raportcard')
              </div>
              <!-- Raport 2 card -->
              <div class="carousel-item">
                    @include('layout.raportcard')
              </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#raportCarousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#raportCarousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
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
