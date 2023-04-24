@extends('layout.master')
@section('title', 'Profile Akun!')

<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

@section('content')

  <section class="d-flex flex-column justify-content-center align-items-center h-100">
    <div class="container mt-2 mt-md-5 p-2">

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @elseif (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <div class="col">

        <div class="row">
          <img src="{{ url('/assets/img/dasbor/user.png') }}" alt=""
            class="rounded-circle img-fluid text-center m-auto" style="max-height: 200px; max-width:200px;">
          <h1 class="text-center">{{ Auth::user()->name }}</h1>
        </div>

        <div class="row">
          @if (Auth::user()->role == 'siswa')
            {{-- if email is empty --}}
            @if (Auth::user()->email == null)
              <div class="col-md-6 offset-md-3">
                <h4 class="text-center">Sambungkan ke Orang Tua</h4>
                <form action="{{ route('email.send') }}" method="post">
                  @csrf
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <input type="text" name="email" id="email" class="form-control"
                        placeholder="Email Orang Tua">
                      {{-- error --}}
                    </div>
                    <div class="ml-2">
                      <button type="submit" class="btn btn-primary">Verifikasi</button>
                    </div>
                  </div>
                </form>
              </div>
            @else
              <div class="col-md-6 offset-md-3">
                <h4 class="text-center">Email Terhubung</h4>
                <form action="{{ route('email.delete') }}" method="post">
                  @csrf
                  @method('DELETE')
                  <p class="text-center">{{ Auth::user()->email }}</p>
                  <div class="text-center">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </div>
                </form>
              </div>
            @endif
          @elseif (Auth::user()->role == 'orangtua')
            <div class="col-md-6 offset-md-3">
              <h3 class="text-center">Nama Anak</h3>
              {{-- Add content for displaying child's name --}}
            </div>
          @else
            <div class="col-md-6 offset-md-3">
              <h3 class="text-center">{{ Auth::user()->email }}</h3>
              {{-- Add content for displaying other user details --}}
            </div>
          @endif
        </div>

      </div>
    </div>
  </section>

@endsection
