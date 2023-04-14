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
  <!-- End Call To Action Section -->
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
            @extends('layout.modal')
            <div class="col-lg-4 col-md-6">
              <div class="service-item">
                {{-- btn --}}
                <div class="btn-con d-flex flex-row justify-content-center align-items-center">
                  <div class="edit">
                    <a role="button"data-bs-toggle="modal" data-bs-target="#editModal{{ ($materi->id) }}">
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
              </div>
            </div>
            @empty
            <p>kosong</p>
          @endforelse
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
          {{-- end add --}}
        </div>
      </div>
    </div>
  </section>
  <!-- Modal input -->
 <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Judul Materi">
            @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          {{-- deskripsi singkat materi --}}
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Singkat Materi</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Deskripsi Singkat Materi">
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          {{-- link materi --}}
          <div class="mb-3">
            <label for="link" class="form-label">Link Materi</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}" placeholder="Link Materi">
            @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
