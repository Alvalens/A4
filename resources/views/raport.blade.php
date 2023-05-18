<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- css --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  @include('layout.asset')
</head>
<style>
  @import {{ url('https://fonts.googleapis.com/css2?family=Potta+One&display=swap') }};

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
    .list {
      font-size: 14px !important;
      margin-left: -10px;
    }
    h5 {
      font-size: 18px !important;
    }
    .desc {
      font-size: 16px !important;
    }
  }

  .progress-bar .progress-bar {
    background-color: #00ff00;
  }

  .desc {
    /* align rata kanan */
    text-align: justify;
    text-justify: inter-word;
    /* font  */
    font-size: 18px;
    font-weight: 600;
    /* white bg */
    background-color: #ffffff4e;
    padding: 8px;
    border-radius: 5px;

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

  .tombol-terbang {
    position: fixed;
    bottom: 50px;
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #2872b8;
    color: #fff;
    font-size: 20px;
    text-align: center;
    line-height: 50px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.329);
    transition: all 0.3s ease;
    z-index: 999090;
  }

  .edit-terbang {
    position: fixed;
    top: 100px;
    left: 50px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: rgb(255, 166, 0);
    color: #fff;
    font-size: 20px;
    text-align: center;
    line-height: 50px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.329);
    transition: all 0.3s ease;
        z-index: 999090;
  }
.fa-chevron-right, .fa-chevron-left {
  /* size */
  font-size: 40px;
  font-weight: 800;
  text-decoration: none;
}

a {
  text-decoration: none;
}
</style>

<body>
  {{-- nav --}}
  <nav class="navbar navbar-expand-lg navbar-light fixed-top mx-5 mt-1">
    <div class="container-fluid">
      <a class="navbar-brand mx-auto" href="#">Raport {{ $nama_user }}</a>
    </div>
  </nav>

  {{-- tombol terbang --}}
  @if (Auth::user()->role == 'admin' || Auth::user()->role == 'guru')

  {{-- tombol edit terbang --}}
  <div class="tombol">
    <a class="edit-terbang" role="button" type="button" data-bs-toggle="modal" data-bs-target="#fileModal">
      <i class="fa-solid fa-pen"></i></a>
  </div>
  @else

  @endif
  <div class="tombol">
    <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
      <i class="fa-solid fa-reply"></i></a>
  </div>


<section style="background: linear-gradient(to top, rgba(0, 0, 0, 0.172) 100%, rgba(0, 0, 0, 0.493) 100%), url({{ url('assets/img/bg.jpg') }}); background-size: cover; padding-top: 80px;"
    class="min-vh-100 px-md-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 mt-5 pl-md-5">
          <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-md-end justify-content-center align-items-center">
              <img src="{{ url('assets/img/rapor/guest.jpg') }}" alt=""
                class="img-fluid rounded-circle align-self-md-end" style="max-height: 200px; max-width:200px;">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-lg-center align-items-start">
              <h2>
                {{ $nama_user }}
              </h2>
              <div class="desc">
                <p>
                  {{ $raportUser->catatan ?? '-' }}
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
                      <li><b>Waktu belajar</b><span>{{ $totalMenit ?? '0' }} menit</span></li>
                      <li><b>Materi kesukaan</b><span>{{ $raportUser->materi_favorit ?? '-' }}</span></li>
                      <li><b>Guru pendamping</b><span>{{ $raportUser->guru_pendamping ?? '-' }}</span></li>
                      <li><b>Orang Tua</b><span>{{ $namaOrtu ?? '-' }}</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-2 mt-md-0">
          <!-- Carousel section -->
          <div id="raportCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Slides -->
            <div class="carousel-inner">
              <!-- Raport 1 card -->
              @for ($level = 1; $level <= $lastLevel; $level++)
                <div class="carousel-item active">
                  @include('layout.raportcard')
                </div>
              @endfor
              <!-- Controls -->
              <a class="carousel-control-prev" href="#raportCarousel" role="button" data-bs-slide="prev">
                <i class="fa-solid fa-chevron-left" style="color: #000000;"></i>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#raportCarousel" role="button" data-bs-slide="next">
                <i class="fa-solid fa-chevron-right"  style="color: #000000;""></i>
                <span class="visually-hidden">Next</span>
              </a>
            </div>

          </div>
        </div>
  </section>
  <section>

    <!-- Modal TAMBAH -->
    <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="fileModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fileModalLabel">Update Raport</h5>
          </div>

          <form action="{{ route('raport.store') }}" method="POST">
            @csrf
            <div class="modal-body">
              {{-- hidden input --}}
              <input type="hidden" name="nama" value="{{ $nama_user }}">

              <div class="mb-3">
                <label for="catatan" class="form-label">catatan</label>
                <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                  name="catatan" value="{{ old('catatan') }}">
                @error('catatan')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="materi_kesukaan" class="form-label">materi kesukaan</label>
                <input type="text" class="form-control @error('materi_kesukaan') is-invalid @enderror"
                  id="materi_kesukaan" name="materi_kesukaan" value="{{ old('materi_kesukaan') }}">
                @error('materi_kesukaan')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="guru_pendamping" class="form-label">guru pendamping</label>
                <input type="text" class="form-control @error('guru_pendamping') is-invalid @enderror"
                  id="guru_pendamping" name="guru_pendamping" value="{{ old('guru_pendamping') }}">
                @error('guru_pendamping')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>

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
