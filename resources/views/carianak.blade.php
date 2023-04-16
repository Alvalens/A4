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
  </style>

  <div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col-md-6">
        {{-- recive the error message --}}
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
        <div class="form">
          <i class="fa fa-search"></i>
          <input type="text" class="form-control form-input" placeholder="Search anything...">
          {{-- <span class="left-pan"><i class="fa fa-microphone"></i></span> --}}
        </div>
      </div>
      <div>
        {{-- daftar anak --}}
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
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
              </tr>
            @empty
              <td colspan="6" class="text-center">Tidak ada data...</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
