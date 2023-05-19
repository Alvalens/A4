@extends('layout.dasbormaster')
@section('datamateri', 'active')

@section('content')

  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            {{-- session  --}}
            @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
              </div>
            @elseif (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
              </div>
            @endif
            <div class="card">
              <div class="card-body">
                <h5 class="box-title">Data Materi
                  <a href="" class="badge badge-success" data-bs-toggle="modal" data-bs-target="#fileModal"
                    style="float:right; font-size: 20px;" role="button">Tambah</a>
                </h5>
              </div>

              <div class="card-body--">
                <div class="table-stats order-table ov-h">
                  <table id="bootstrap-data-table" class="table">
                    <thead>
                      <tr>
                        <th class="id" name="id">#</th>
                        <th></th>
                        <th name="judul">Judul Materi</th>
                        <th name="level">Level</th>
                        <th name="timestamp">Waktu Pengubahan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($materies as $materi)
                        <tr>
                          <td>{{ $materi->id }}</td>
                          <td><iframe width="175" height="98.437,5" src="{{ $materi->link }}" frameborder="0"
                              allowfullscreen></iframe></td>
                          <td>{{ $materi->judul }}</td>
                          <td>{{ $materi->level }}</td>
                          <td>{{ $materi->updated_at }}</td>
                          <td><a href="{{ route('materials.show', ['materi' => $materi->id]) }}" role="button">
                              <button class="btn">
                                <span class="btn-label">
                                  <i class="fa fa-eye"></i>
                                </span>
                                Lihat Materi
                              </button>
                            </a>
                        </tr>
                      @empty

                      @endforelse

                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal TAMBAH -->
    <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="fileModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fileModalLabel">Tambah Materi</h5>
          </div>

          <form action="{{ route('materials.store') }}" method="POST">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" required placeholder="Judul Materi"
                  name="judul" value="{{ old('judul') }}">
                @error('judul')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" required placeholder="Level Materi"
                  name="level" value="{{ old('level') }}">
                @error('level')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi Materi (Opsional)"
                  name="deskripsi" value="{{ old('deskripsi') }}">
                @error('deskripsi')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" required placeholder="https://www.youtube.com/embed/..."
                  name="link" value="{{ old('link') }}">
                @error('link')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <input type="hidden" name="action" value="store">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- Modal TAMBAH -->

  @endsection

  @section('js')
    <script src="{{ url('assets/js/dasbor/lib/data-table/datatables.min.js') }}"></script>
        <script src="{{ url('assets/js/dasbor/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('assets/js/dasbor/init/datatables-init.js') }}"></script>

    <script type="text/javascript">
      $.fn.dataTable.ext.errMode = 'none';
      $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable(
        // disable the error warn

        );
      });
    </script>
@endsection