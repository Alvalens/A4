@extends('layout.master')
@section('title', 'Profile Akun!')

<link rel="stylesheet" href="{{ url('assets/css/bermain.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/profile.css') }}">

@section('body-style')
  background-image: url(assets/img/bg-sky.jpg);
  background-repeat: no-repeat;
@endsection

@section('content')

  <section class="d-flex flex-column justify-content-center align-items-center h-100">
    <div class="container mt-2 mt-md-5 p-2">

      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @elseif (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <div class="col">

        <div class="row">
          <img src="{{ url('/assets/img/dasbor/user.png') }}" alt="" class="rounded-circle img-fluid text-center m-auto" style="max-height: 200px; max-width:200px;">
          <h1 class="text-center">
            {{ Auth::user()->name }}
            <i class="fas fa-pencil-alt" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editNameModal"></i>
          </h1>
        </div>

        <div class="row">
          @if (Auth::user()->role == 'siswa')
            {{-- if email is empty --}}
            @if (Auth::user()->email == null)
              <div class="col-md-6 offset-md-3">
                <h5 class="text-center">Sambungkan ke Orang Tua</h5>
                <form action="{{ route('email.send') }}" method="post">
                  @csrf
                  <div class="d-flex">
                    <div class="flex-grow-1 custom-search">
                      <input type="text" name="email" id="email" class="form-control custom-search-input"
                        placeholder="Email Orang Tua">
                      {{-- error --}}
                      <button class="custom-search-botton button-3333" role="button">Verifikasi</button>
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
                    <button class="button-333" role="button">Hapus</button>
                  </div>
                </form>
                  <button class="custom-search-botton button-33" role="button">Rapor</button>
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

<!-- Modal EDIT -->
<div class="modal" id="editNameModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Profil</h5>
          </div>
          <form action="" method="POST">
              @method('PATCH')
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="">
                </div>
                <div class="mb-3">
                  <label for="foto" class="form-label">Foto Profil</label>
                  <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
          </form>
      </div>
  </div>
</div>
<!-- Modal EDIT -->

@endsection
