@extends('layout.dasbormaster')
@section('akunpengguna', 'active')

@section('content')

<div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">

              <div class="card-body">
                <h5 class="box-title">Pengaturan Pengguna
                  <a href="" class="badge badge-success" data-bs-toggle="modal" data-bs-target="#fileModal" style="float:right; font-size: 20px;" role="button">Tambah</a>
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
<div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="fileModalLabel">Tambah Akun</h5>
          </div>

          <form action="{{ route('akun.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select class="form-control" id="role" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="guru">Guru</option>
                    <option value="murid">Murid</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
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