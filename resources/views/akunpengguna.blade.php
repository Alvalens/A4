@extends('layout.dasbormaster')
@section('akunpengguna', 'active')

@section('content')

  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              {{-- session status and error --}}
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
              {{-- end session status and error --}}
              <div class="card-body">
                <h5 class="box-title">Pengaturan Pengguna
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
                        <th name="nama">Nama</th>
                        <th name="ortu">Email</th>
                        <th name="role">Role</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($users as $row)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email ?? 'Tidak terhubung' }}</td>
                          <td>{{ $row->role }}</td>
                          {{-- lihat --}}
                          <td> <a href="{{ route('akun.edit', ['nama' => $row->name]) }}">
                              <button class="btn">
                                <span class="btn-label">
                                  <i class="fa fa-eye"></i>
                                </span>
                                Lihat Akun
                              </button>
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

  <!-- Modal TAMBAH -->
  <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel">Tambah Akun</h5>
        </div>
        <form action="{{ route('akun.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="nama" required placeholder="Masukkan nama"
                value="{{ old('nama') }}">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                <option value="" selected>Pilih Role</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ old('role') === 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="ortu" {{ old('role') === 'ortu' ? 'selected' : '' }}>Orang tua</option>
                <option value="siswa" {{ old('role') === 'siswa' ? 'selected' : '' }}>Siswa</option>
              </select>
              @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" required placeholder="Masukkan email"
                name="email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required placeholder="Masukkan password"
                name="password">
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
