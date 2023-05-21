@extends('layout.master')
@section('title', 'Masuk Dulu Yaa!')

@section('css')
<link rel="stylesheet" href="{{ url('assets/css/login.css') }}">
@endsection
@section('body-style')
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%),
  url(assets/img/bg.jpg);
  font-family: 'Fredoka One', sans-serif;
  letter-spacing: 1px;
  font-weight: 200;
  font-size: 15px;
  line-height: 1.7;
  color: #ffffff;
  overflow: hidden;
  background-size: cover;
@endsection

@section('content')
  <div class="section">
    <div class="container mt-3">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">

            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            {{-- log err msg --}}
            @if (session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif

            <input type="checkbox" id="reg-log" class="checkbox" @if ($errors->has('regname') || $errors->has('regmail') || $errors->has('regpass') || $errors->has('regpass')) checked @endif>

            <label for="reg-log"></label>

            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">

                <!-- Start Masuk -->
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <h4 class="m-2 pb-3 animated">Masuk</h4>
                        <span class="mt-2">Masukkan:</span>
                        <div class="form-group mt-2">
                          <label for="logusername" class="sr-only">Nama</label>
                          <input type="username" name="logusername"
                            class="form-style @error('logusername') is-invalid @enderror" value="{{ old('logusername') }}"
                            placeholder="Nama" id="logusername" autocomplete="on">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logusername')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="logpass" class="sr-only">Kata Sandi</label>
                          <input type="password" name="logpass" class="form-style @error('logpass') is-invalid @enderror"
                            placeholder="Kata Sandi" id="logpass" autocomplete="on">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logpass')
                            <small class="error text-danger">{{ $message }}</small> <br>
                          @enderror
                          <button type="button" class="toggle-password btn btn-secondary my-3"
                            onclick="togglePassword('logpass')">Lihat Kata
                            Sandi</button>
                        </div>
                        <button type="submit" class="btn my-4">Masuk</button>
                        <div class="mt-5">
                          <small>
                            <a href="{{ route('lupa.password') }}" class="mt-3"
                              style="color: rgb(255, 255, 255) !important;">Lupa Kata Sandi?</a> <br>
                            <a role="button" onclick="changeForm()" class="mt-3"
                              style="color: rgb(255, 255, 255) !important;">Belum punya akun?</a>
                          </small>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Masuk -->

                <!-- Start Daftar -->
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <h4 class="m-2 pb-3 animated">Daftar</h4>
                        <label for="user-type-back" class="mt-2">Aku Adalah:</label>
                        <select class="form-style" id="user-type-back" name="user-type-back" onchange="toggleFormBack()">
                          <option class="form-style" value="siswa">siswa</option>
                          <option class="form-style" value="ortu">Orang Tua</option>
                        </select>
                        <span>Masukkan:</span>
                        <div class="form-group mt-2">
                          <label for="regname" class="sr-only">Nama</label>
                          <input type="username" name="regname"
                            class="form-style @error('regname') is-invalid @enderror" id="regname" placeholder="Nama"
                            value="{{ old('regname') }}" autocomplete="on">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('regname')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="regmail" class="sr-only">Alamat Email</label>
                          <input type="email" name="regmail" style="display: none;"
                            class="form-style @error('regmail') is-invalid @enderror" placeholder="Alamat Email"
                            id="regmail" value="{{ old('regmail') }}" autocomplete="on">
                          <i class="input-icon uil uil-at"></i>
                          @error('regmail')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="regpass" class="sr-only">Kata Sandi</label>
                          <input type="password" name="regpass"
                            class="form-style  @error('regpass') is-invalid @enderror" placeholder="Kata Sandi"
                            id="regpass" value="{{ old('regpass') }}" autocomplete="on">
                          <i class="input-icon uil uil-lock-alt"></i>
                          <small class="error text-danger" id="passerr">
                            @error('regpass')
                              {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <div class="form-group mt-2">
                          <label for="confirmpass" class="sr-only">Konfirmasi Sandi</label>
                          <input type="password" name="confirmpass"
                            class="form-style  @error('confirmpass') is-invalid @enderror"
                            placeholder="Konfirmasi Sandi" id="confirmpass" value="{{ old('confirmpass') }}"
                            autocomplete="on">
                          <i class="input-icon uil uil-lock-alt"></i>
                          <small class="error text-danger" id="confirerr">
                            @error('confirmpass')
                              {{ $message }}
                            @enderror
                          </small> <br>
                          <button type="button" class="btn btn-secondary toggle-password my-3" id="showpass"
                            onclick="togglepass2()">Lihat
                            Kata Sandi</button>
                        </div>
                        <button type="submit" id="submit" class="btn mt-4">Kirim</button>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Daftar -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @section('js')
  <script src="{{ url('assets/js/login.js') }}"></script>
  @endsection

@endsection
