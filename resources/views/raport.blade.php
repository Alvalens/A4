<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- css --}}
  <link href="{{ url('assets/css/rapor/style.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/rapor/responsive.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/rapor/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/rapor/rapor.css') }}" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <!-- slider stylesheet -->
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: #f9f6ef;
    }

    /* on md and lower h1 to 2rem */
    @media (max-width: 768px) {
      h1 {
        font-size: 2rem !important;
      }
    }
  </style>
</head>

<body>
  <div class="tombol">
    <a href="{{ url()->previous() }}" class="tombol-terbang" role="button" type="button">
      <i class="fa-solid fa-reply"></i></a>
  </div>
  <div class="hero_area">
    <div class="hero_area2">

      <!-- header section strats -->
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
              <img src="{{ url('assets/img/beranda/title-a4.png') }}" alt="" />
              <span><strong>RAPOR</strong></span>
            </a>
          </nav>
        </div>
      </header>
      <!-- end header section -->

      <!-- menu section -->
      <section class=" menu_section position-relative">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-4 offset-md-1">
              <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="img-box b-1">
                      <img src="{{ url('assets/img/rapor/guest.jpg') }}" alt="" class="img-fluid rounded-circle"
                        style="max-height: 200px; max-width:200px;" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=" col-md-5 offset-md-1">
              <div class="detail-box">
                <h1>
                  <strong>{{ $nama_user }}</strong>
                </h1>
                <p>
                  {{ $raportUser->catatan ?? '-' }}
                </p>

                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'guru')
                  <div class="btn-box">
                    <a href="" role="button" type="button" class="btn-1" data-bs-toggle="modal"
                      data-bs-target="#fileModal">
                      Ubah Raport
                    </a>
                  </div>
                @else
                  <div class="btn-box">
                    <a href="{{ url()->previous() }}" role="button" type="button" class="btn-2">
                      Kembali
                    </a>
                  </div>
                @endif

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end menu section -->
    </div>
    <style>
      .wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
      }
    </style>
    <!-- info section -->
    <section class="info_section layout_padding">
      <div class="container">
        <div class="wrap">
          <div class="heading_container">
            <h2 style="margin-top: 100px">
              INFORMASI
            </h2>
            <hr>
          </div>
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Waktu Belajar</th>
                <td>{{ $totalMenit ?? '0' }} menit</td>
              </tr>
              <tr>
                <th scope="row">Materi Favorit</th>
                <td>{{ $raportUser->materi_favorit ?? '-' }}</td>
              </tr>
              <tr>
                <th scope="row">Guru Pendamping</th>
                <td>{{ $raportUser->guru_pendamping ?? '-' }}</td>
              </tr>
              <tr>
                <th scope="row">Orang Tua</th>
                <td>{{ $namaOrtu ?? '-' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <section class="rapor_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <hr>
          <h2>
            DATA RAPOR
          </h2>
        </div>
      </div>
      <div id="raportCarousel" class="carousel slide" data-ride="carousel">
        <!-- Controls -->
        <a class="carousel-control-prev" href="#raportCarousel" role="button" data-bs-slide="prev">
          <i class="fa-solid fa-chevron-left" style="color: #000000;"></i>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#raportCarousel" role="button" data-bs-slide="next">
          <i class="fa-solid fa-chevron-right" style="color: #000000;""></i>
          <span class="visually-hidden">Next</span>
        </a>
        <div class="carousel-inner">
          @for ($level = 1; $level <= $lastLevel; $level++)
            <div class="carousel-item @if ($level == 1) active @endif">
              <div class="box">
                <!-- Raport 1 card -->
                <div class="rapor_id">
                  @include('layout.raportcard')
                </div>
              </div>
            </div>
        @endfor
      </div>
  </div>
  </section>

  <!-- end hot section -->

  <!-- Modal TAMBAH -->
  <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel">Ubah Rapor</h5>
        </div>

        <form action="{{ route('raport.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            {{-- hidden input --}}
            <input type="hidden" name="nama" value="{{ $nama_user }}">
            <div class="mb-3">
              <label for="catatan" class="form-label">Catatan</label>
              <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                name="catatan" value="{{ old('catatan', $raportUser->catatan ?? '-') }}">
              @error('catatan')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="materi_kesukaan" class="form-label">Materi Favorit</label>
              <input type="text" class="form-control @error('materi_kesukaan') is-invalid @enderror"
                id="materi_kesukaan" name="materi_kesukaan"
                value="{{ old('materi_kesukaan', $raportUser->materi_favorit ?? '-') }}">
              @error('materi_kesukaan')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="guru_pendamping" class="form-label">Guru Pendamping</label>
              <input type="text" class="form-control @error('guru_pendamping') is-invalid @enderror"
                id="guru_pendamping" name="guru_pendamping"
                value="{{ old('guru_pendamping', $raportUser->guru_pendamping ?? '-') }}">
              @error('guru_pendamping')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- script --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script>
    // add class scrolled to navbar wehn page is scrolled
  </script>
</body>

</html>
