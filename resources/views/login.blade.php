@extends('layout.master')
@section('title', 'Masuk Dulu Yaa!')

<link rel="stylesheet" href="{{ url('assets/css/login.css') }}">

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
  <style>
    .is-invalid {
      border: 2px solid red !important;
      padding-right: calc(1.5em + 0.75rem);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right calc(0.375em + 0.1875rem) center;
      background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .is-invalid:focus {
      border-color: red !important;
      box-shadow: 0 0 0 0.4rem rgba(220, 53, 70, 0.344) !important;
    }

    .is-valid {
      border: 2px solid green !important;
      padding-right: calc(1.5em + 0.75rem);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%2328a745'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M3.5 6l2 2 4.5-4.5'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right calc(0.375em + 0.1875rem) center;
      background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .is-valid:focus {
      border-color: green !important;
      box-shadow: 0 0 0 0.4rem rgba(40, 167, 69, 0.344) !important;
    }

    /* on btn small set the font smaller */
    @media (max-width: 576px) {
      .btn {
        font-size: 0.7rem;
      }
    }
  </style>
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
                            placeholder="Nama" id="logusername" autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logusername')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="logpass" class="sr-only">Kata Sandi</label>
                          <input type="password" name="logpass" class="form-style @error('logpass') is-invalid @enderror"
                            placeholder="Kata Sandi" id="logpass" autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logpass')
                            <small class="error text-danger">{{ $message }}</small>
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
                            value="{{ old('regname') }}" autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('regname')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="regmail" class="sr-only">Alamat Email</label>
                          <input type="email" name="regmail" style="display: none;"
                            class="form-style @error('regmail') is-invalid @enderror" placeholder="Alamat Email"
                            id="regmail" value="{{ old('regmail') }}" autocomplete="off">
                          <i class="input-icon uil uil-at"></i>
                          @error('regmail')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="regpass" class="sr-only">Kata Sandi</label>
                          <input type="password" name="regpass"
                            class="form-style  @error('regpass') is-invalid @enderror" placeholder="Kata Sandi"
                            id="regpass" value="{{ old('regpass') }}" autocomplete="off">
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
                            autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          <small class="error text-danger" id="confirerr">
                            @error('confirmpass')
                              {{ $message }}
                            @enderror
                          </small>
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

  <!-- SCRIPT -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    //click to toggle form checkbox reguster
    function changeForm() {
      // add checked to "reg-log
      var reglog = document.getElementById("reg-log");
      reglog.checked = true;
    }

    function validatePassword() {
      var regpass = document.getElementById("regpass");
      var confirmpass = document.getElementById("confirmpass");
      var regpassValue = regpass.value;
      var confirmpassValue = confirmpass.value;
      var regpassRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

      if (regpassRegex.test(regpassValue)) {
        regpass.classList.remove("is-invalid");
        regpass.classList.add("is-valid");
        document.getElementById("passerr").style.display = "none";
      } else {
        regpass.classList.remove("is-valid");
        regpass.classList.add("is-invalid");
        document.getElementById("passerr").style.display = "block";
        document.getElementById("passerr").innerHTML =
          "Kata sandi minimal 8 karakter, 1 huruf besar, 1 huruf kecil, 1 angka";
      }

      if (confirmpassValue === regpassValue) {
        confirmpass.classList.remove("is-invalid");
        confirmpass.classList.add("is-valid");
        document.getElementById("confirerr").style.display = "none";
      } else {
        confirmpass.classList.remove("is-valid");
        confirmpass.classList.add("is-invalid");
        document.getElementById("confirerr").style.display = "block";
        document.getElementById("confirerr").innerHTML = "Kata sandi tidak sama";
      }
    }

    var regpass = document.getElementById("regpass");
    regpass.addEventListener("keyup", validatePassword);

    var confirmpass = document.getElementById("confirmpass");
    confirmpass.addEventListener("keyup", validatePassword);
  </script>
  <script>
    function toggleForm() {
      var x = document.getElementById("user-type").value;
      if (x === "siswa") {
        document.getElementById("regmail").style.display = "none";
      } else if (x === "orangtua") {
        document.getElementById("regmail").style.display = "block";
      } else {
        document.getElementById("regmail").style.display = "block";
      }
    }

    function toggleFormBack() {
      var y = document.getElementById("user-type-back").value;
      if (y === "siswa") {
        document.getElementById("regmail").style.display = "none";
      } else if (y === "ortu") {
        document.getElementById("regmail").style.display = "block";
      } else {
        document.getElementById("regmail").style.display = "block";
      }
    }

    function togglePassword(fieldId) {
      var passwordField = document.getElementById(fieldId);
      var toggleButton = document.querySelector(`#${fieldId} + .toggle-password`);
      if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleButton.innerHTML = "Sembunyikan Kata Sandi";
      } else {
        passwordField.type = "password";
        toggleButton.innerHTML = "Lihat Kata Sandi";
      }
    }
    // toggle password multi regpass and confirmpass
    var regpass = document.getElementById("regpass");
    var confirmpass = document.getElementById("confirmpass");
    var btn = document.getElementById("showpass");

    function togglepass2() {
      if (regpass.type === "password" && confirmpass.type === "password") {
        regpass.type = "text";
        confirmpass.type = "text";
        btn.innerHTML = "Sembunyikan Kata Sandi";

      } else {
        regpass.type = "password";
        confirmpass.type = "password";
        btn.innerHTML = "Lihat Kata Sandi";
      }
    }
  </script>
  <!-- SCRIPT -->

@endsection
