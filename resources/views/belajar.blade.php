@extends('layout.master')
@section('title', 'Yuk, Belajar!')
@section('css', 'belajar')

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection
<style>
  .circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #add8e6;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    color: white;
  }

  .circle-del {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #bb3232;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    color: white;
  }

  .circle-edit {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #adbb32;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    color: white;
  }

  /* remove buttonm style in del */
  .del {
    background-color: transparent;
    border: none;
    color: white;
  }
</style>
@section('content')
   <section id="call-to-action" class="call-to-action">
    <div class="section-header-1">
      <img src="assets/img/header2.png">
      <img src="assets/img/header3.png">
    </div>
    <div class="container text-center" data-aos="zoom-out">
      <a href="https://youtu.be/pUn4kWVm3F0" class="glightbox play-btn"></a>
      <br>
    </div>
  </section>
  <!-- End Call To Action Section -->

  <a href="#our-services" class="scroll-arrow"><i class="bi bi-chevron-double-down"></i></a>
  {{-- youtube links --}}
<section class="main">
  <div class="container services" data-aos="fade-up">
    <div class="section-header">
      <img src="assets/img/header4.png">
    </div>
    <div id="our-services" class="our-services">
      {{-- main container --}}
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-2" data-aos="fade-up" data-aos-delay="100">
        <!-- Youtube links -->
        @forelse ($materies as $materi)
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              {{-- main --}}
              <div class="icon">
                <i class="bi bi-filter-left"></i>
              </div>
              <h3>{{ $materi->judul }}</h3>
              <p>{{ $materi->deskripsi }}</p>
              <iframe width="350" height="196.875" src="{{ $materi->link }}" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        @empty
          <p>No materies available.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>


  {{-- jq --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    // Menampilkan kembali modal saat halaman direfresh jika terdapat error
    var hasError = document.querySelector('.is-invalid');
    if (hasError) {
      var fileModal = new bootstrap.Modal(document.getElementById('fileModal'));
      // show the modal that has the error
      fileModal.show();
    }
  </script>


@endsection
