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
  <!-- ======= Call To Action Section ======= -->
  <!-- Start Call To Action -->
  <section id="call-to-action" class="call-to-action">
    <div class="section-header-1">
      <img src="assets/img/header2.png">
      <img src="assets/img/header3.png">
    </div>
    <div class="container text-center" data-aos="zoom-out">
      <a href="https://youtu.be/pUn4kWVm3F0" class="glightbox play-btn"></a>
      <a href="https://youtu.be/yLVlskyNVpI" class="glightbox"></a>
      <a href="https://youtu.be/ZiCs8_KAKKI" class="glightbox"></a>
      <a href="https://youtu.be/lnczJuCF-pA" class="glightbox"></a>
      <a href="https://youtu.be/gzRtLZRVV0Q" class="glightbox"></a>
      <a href="https://youtu.be/1Fh6DCCM40w" class="glightbox"></a>
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
        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3" data-aos="fade-up" data-aos-delay="100">
          <!-- Youtube links -->
          @foreach ($materies as $materi)
          @extends('layout.modal')
            <div class="col-lg-4 col-md-6">
              <div class="service-item">
                {{-- delete btn --}}
                <div class="btn-con d-flex flex-row justify-content-center align-items-center">
                  <div class="edit">
                    <a role="button"data-bs-toggle="modal"
                      data-bs-target="#editModal">
                      <div class="circle-edit">
                      <i class="fa-solid fa-pen"></i>
                      </div>
                    </a>
                  </div>
                  <div class="delete">
                    <form action="{{ route('materi.destroy', $materi->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this material?')"
                        class="del">
                        <div class="circle-del">
                          <i class="fa-solid fa-minus"></i>
                        </div>
                      </button>
                    </form>
                  </div>
                </div>
                {{-- main --}}
                <div class="icon">
                  <i class="bi bi-filter-left"></i>
                </div>
                <h3>{{ $materi->judul }}</h3>
                <p>{{ $materi->deskripsi }}</p>
                <iframe width="350" height="196.875" src="{{ $materi->link }}" frameborder="0"
                  allowfullscreen></iframe>
                <a href="#" class="btn mt-4">selesai</a>
                <div class="feedback1" style="display: none;">
                </div>
              </div>
            </div>
        </div>
      </div>
      @endforeach
      {{-- add materi --}}
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <a role="button" data-bs-toggle="modal" data-bs-target="#fileModal">
              <div class="circle">
                <i class="fa-solid fa-plus"></i>
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- End Our Services Section -->
    </div>
    </div>
    </div>
  </section>
  <!-- Modal -->
  <div class="modal fade " id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="fileModalLabel">Masukkan Materi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- body -->
          <form action="{{ route('kirim') }}" method="post">
            @csrf
            {{-- judul materi --}}
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Materi</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Materi">
            </div>
            {{-- deskripsi singkat materi --}}
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi Singkat Materi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                placeholder="Deskripsi Singkat Materi">
            </div>
            {{-- link materi --}}
            <div class="mb-3">
              <label for="link" class="form-label">Link Materi</label>
              <input type="text" class="form-control" id="link" name="link" placeholder="Link Materi">
            </div>
            {{-- hidden input level = 1 --}}
            <input type="hidden" name="level" value="1">
            <hr>
            <div class="">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ok</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    $('#editModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      var judul = button.data('judul')
      var deskripsi = button.data('deskripsi')
      var link = button.data('link')
      var modal = $(this)
      modal.find('.modal-body #editId').val(id)
      modal.find('.modal-body #editJudul').val(judul)
      modal.find('.modal-body #editDeskripsi').val(deskripsi)
      modal.find('.modal-body #editLink').val(link)
    })
  </script>


@endsection
