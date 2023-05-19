@extends('layout.dasbormaster')
@section('datatekateki', 'active')

@section('content')
  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            {{-- session --}}
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
                <h5 class="box-title">Data Teka-Teki
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
                        <th name="pertanyaan">Pertanyaan</th>
                        <th name="kunci">Kunci Jawaban</th>
                        <th name="timestamp">Waktu Pengubahan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($questions as $question)
                        <tr>
                          <td>{{ $question->id }}</td>
                          <td>{{ $question->pertanyaan }}</td>
                          <td>{{ $question->kunci }}</td>
                          <td>{{ $question->updated_at }}</td>
                          <td><a href="{{ route('tekatekis.show', ['question' => $question->id]) }}" role="button">
                              <button class="btn">
                                <span class="btn-label">
                                  <i class="fa fa-eye"></i>
                                </span>
                                Lihat Soal
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
            <h5 class="modal-title" id="fileModalLabel">Tambah Teka-Teki</h5>
          </div>
          <form action="{{ route('tekatekis.store') }}" method="POST">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                  @error('pertanyaan') is-invalid @enderror value="{{ old('pertanyaan') }}">
                @error('pertanyaan')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="a" class="form-label">Jawaban A</label>
                <input type="text" class="form-control" id="a" name="a" @error('a') is-invalid @enderror
                  value="{{ old('a') }}">
                @error('a')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="b" class="form-label">Jawaban B</label>
                <input type="text" class="form-control" id="b" name="b" @error('b') is-invalid @enderror
                  value="{{ old('b') }}">
                @error('b')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="c" class="form-label">Jawaban C</label>
                <input type="text" class="form-control" id="c" name="c" @error('c') is-invalid @enderror
                  value="{{ old('c') }}">
                @error('c')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="kunci" class="form-label">Kunci Jawaban</label>
                <select class="form-control" id="kunci" name="kunci" @error('kunci') is-invalid @enderror
                  value="{{ old('kunci') }}">
                  <option value="">Pilih Kunci Jawaban</option>
                  <option value="a">a</option>
                  <option value="b">b</option>
                  <option value="c">c</option>
                </select>
                @error('kunci')
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