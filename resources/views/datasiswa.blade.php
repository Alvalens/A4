@extends('layout.dasbormaster')
@section('datasiswa', 'active')

@section('content')

  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="box-title">Data Siswa</h4>
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
                                <button class="btn">
                                  <span class="btn-label">
                                    <i class="fa fa-eye"></i>
                                  </span>
                                  Lihat Rapor
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