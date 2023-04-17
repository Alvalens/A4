@extends('layout.mastero')

@include('layout.asset')

@section('content')
  <style>
    body {

      background: #d1d5db;
    }

    .height {

      height: 100vh;
    }

    .form {

      position: relative;
    }

    .form .fa-search {

      position: absolute;
      top: 20px;
      left: 20px;
      color: #9ca3af;

    }

    .form span {

      position: absolute;
      right: 17px;
      top: 13px;
      padding: 2px;
      border-left: 1px solid #d1d5db;

    }

    .left-pan {
      padding-left: 7px;
    }

    .left-pan i {

      padding-left: 10px;
    }

    .form-input {

      height: 55px;
      text-indent: 33px;
      border-radius: 10px;
    }

    .form-input:focus {

      box-shadow: none;
      border: none;
    }

    button {
      font-family: inherit;
      font-size: 16px;
      background: rgb(65, 188, 225);
      color: white;
      padding: 0.7em 1em;
      padding-left: 0.9em;
      display: flex;
      align-items: center;
      border: none;
      border-radius: 16px;
      overflow: hidden;
      transition: all 0.2s;
    }

    button span {
      display: block;
      margin-left: 0.3em;
      transition: all 0.3s ease-in-out;
    }

    button svg {
      display: block;
      transform-origin: center center;
      transition: transform 0.3s ease-in-out;
    }

    button:hover .svg-wrapper {
      animation: fly-1 0.6s ease-in-out infinite alternate;
    }

    button:hover svg {
      transform: translateX(2.5em) rotate(45deg) scale(1.1);
    }

    button:hover span {
      transform: translateX(8em);
    }

    button:active {
      transform: scale(0.95);
    }
    a:link {
      text-decoration: none !important;
    }

    @keyframes fly-1 {
      from {
        transform: translateY(0.1em);
      }

      to {
        transform: translateY(-0.1em);
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


  <div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col">
        {{-- recive the error message --}}
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
        {{-- daftar anak --}}
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
  <script src="{{ url('js/jq.js') }}"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
    let table = new DataTable('#myTable', {
      // options
    });
  </script>
@endsection
