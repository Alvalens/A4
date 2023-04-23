@extends('layout.mastero')
@include('layout.asset')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
<link rel="stylesheet" href="{{ url('assets/css/siswa.css') }}">

@section('content')
  
  <div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col">

        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif

        <h2 class="my-3">Daftar Siswa</h2>
        <table class="display" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Raport</th>
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
                <td>
                  <a href="{{ route('raport', ['nama' => $r->name]) }}">
                    <button>
                      <div class="svg-wrapper-1">
                        <div class="svg-wrapper">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                              d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                              fill="currentColor"></path>
                          </svg>
                        </div>
                      </div>
                      <span>Lihat Raport</span>
                    </button>
                  </a>
                </td>
              </tr>
            @empty
              <td colspan="6" class="text-center">Tidak ada data...</td>
            @endforelse

          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Raport</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div>
      </div>
    </div>
  </div>

  <!-- SCRIPT -->
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
    let table = new DataTable('#myTable', {
      // options
    });
  </script>
  <!-- SCRIPT -->

@endsection