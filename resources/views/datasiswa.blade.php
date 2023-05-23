@extends('layout.dasbormaster')
@section('datasiswa', 'active')

@section('content')

  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @elseif (session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif

            <div class="card">
              <div class="card-body">
                <h5 class="box-title">Data Siswa
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
                        <th name="nama">Nama Siswa</th>
                        <th name="ortu">Email OrangTua</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($data as $row)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email ?? 'Tidak terhubung' }}</td>
                          <td><a href="{{ route('raport', ['nama' => $row->name]) }}">
                              <button class="btn" style="background-color: rgb(0, 168, 151)">
                                <span class="btn-label">
                                  <i class="fa fa-eye" style="color: rgb(0, 0, 0);"></i>
                                </span>
                              </button>
                               <a href="{{ route('siswa.edit', ['nama' => $row->name]) }}">
                              <button class="btn" style="background-color: rgb(237, 207, 55)">
                                <span class="btn-label">
                                  <i class="fa fa-pencil" style="color: rgb(0, 0, 0);"></i>
                                </span>
                              </button>
                                </a>

                            </a>
                          </td>
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
  </div>
  {{-- mdal --}}
  <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel">Tambah Siswa</h5>
        </div>
        <form action="{{ route('siswa.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name"
                required placeholder="Masukkan nama" value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="Masukkan email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required
                placeholder="Masukkan password" name="password">
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
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
