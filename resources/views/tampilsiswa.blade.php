@extends('layout.master')

@section('css')
  <link rel="stylesheet" href="{{ url('assets/css/dasbor/table.css') }}">
  <style>
    /* remove a link all attribute */
    a {
      color: black;
      text-decoration: none;
      color: inherit;
    }

    .col {
      display: flex;
      flex-direction: column;
      min-height: 88vh;
      justify-content: center;
      align-items: center;
    }

    .card {
      width: 100%;
      height: 100%;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      background-color: #fff;
    }

    /* on mobile small the font btn size */
    @media (max-width: 576px) {
      .btn {
        font-size: 12px;
      }
    }
  </style>
@endsection
@section('content')
  <div class="container">
    <div class="col">

      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif
      <div class="card">
        <h2 class="my-3 text-center">Daftar Siswa</h2>
        <div class="table-stats order-table ov-h">
          <table id="bootstrap-data-table" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              @forelse ($Siswa as $r)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td> <a href="{{ route('raport', ['nama' => $r->name]) }}">
                      {{ $r->name }}
                    </a>
                  </td>
                  <td class="text-end">
                    <a href="{{ route('raport', ['nama' => $r->name]) }}">
                      <button class="btn">
                        <span class="btn-label">
                          <i class="fa fa-eye"></i>
                        </span>
                        Lihat Raport
                      </button>
                    </a>
                  </td>
                </tr>
              @empty
                <td colspan="6" class="text-center">Tidak ada data, cek apakah akun siswa sudah terhubung...</td>
              @endforelse

            </tbody>
          </table>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div>
@endsection
<!-- SCRIPT -->
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
      $('#bootstrap-data-table-export').DataTable();
    });
  </script>
  <!-- SCRIPT -->
@endsection
