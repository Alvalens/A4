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
</head>
<style>
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
      margin-top: 0 ;

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

  <section style="background: url('pictures/bg.jpg'); background-size: cover; padding-top: 80px;" class="vh-100">
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
          <div class="card cardr">
            <div class="container">
              <div class="judul mb-4 mt-3">
                <h3 class="text-center">Raport 1</h3>
              </div>
              <div class="progress-bar mx-5 mb-5 mt-2">
                <h4>
                  progress
                </h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <h5>25%</h5>
              </div>
              <div class="materi">
                <h5 class="text-center">Materi</h5>
                <div
                  class="materies row row-cols-3 row-cols-md-3 justify-content-center align-items-center gy-5 p-md-5">
                  <div class="mat rounded-circle text-center">
                    {{-- svg 1x1 white circle fill green --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green"
                      class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8" />
                      <text x="51%" y="58%" text-anchor="middle" fill="white"
                        font-size="25%">100%</text>
                      <h5 class="text-center">Belajar Angka</h5>
                  </div>
                  <div class="mat rounded-circle text-center">
                    {{-- svg 1x1 white circle fill green --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green"
                      class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8" />
                      <text x="51%" y="58%" text-anchor="middle" fill="white"
                        font-size="25%">100%</text>
                      <h5 class="text-center">Belajar Angka</h5>
                  </div>
                  <div class="mat rounded-circle text-center">
                    {{-- svg 1x1 white circle fill green --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="orange"
                      class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8" />
                      <text x="51%" y="58%" text-anchor="middle" fill="white"
                        font-size="25%">50%</text>
                      <h5 class="text-center">Belajar Angka</h5>
                  </div>
                  <div class="mat rounded-circle text-center">
                    {{-- svg 1x1 white circle fill green --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green"
                      class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8" />
                      <text x="51%" y="58%" text-anchor="middle" fill="white"
                        font-size="25%">100%</text>
                      <h5 class="text-center">Belajar Kimia</h5>
                  </div>
                  <div class="mat rounded-circle text-center">
                    {{-- svg 1x1 white circle fill green --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="red"
                      class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8" />
                      <text x="51%" y="58%" text-anchor="middle" fill="white"
                        font-size="25%">1%</text>
                      <h5 class="text-center">Belajar Huruf</h5>
                  </div>
                  <div class="mat rounded-circle text-center">
                    {{-- svg 1x1 white circle fill green --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green"
                      class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8" />
                      <text x="51%" y="58%" text-anchor="middle" fill="white"
                        font-size="25%">100%</text>
                      <h5 class="text-center">Belajar Angka</h5>
                  </div>
                </div>
              </div>
              {{-- grey more button --}}
              <div class="more text-center mb-3">
                <button type="button" class="btn btn-outline-secondary btn-lg btn-block">More</button>
              </div>

            </div>
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
