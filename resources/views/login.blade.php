@extends('layout.master')
@section('title', 'Masuk Dulu Yaa!')

@section('css')
  <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">
@endsection

@section('body-style')
  @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%),
  url(assets/img/bg.jpg);
  font-family: 'Fredoka One';
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
                            placeholder="Nama" id="logusername" autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logusername')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <label for="logpass" class="sr-only">Kata Sandi</label>
                          <div class="password-input-container">
                            <input type="password" name="logpass" class="form-style @error('logpass') is-invalid @enderror"
                              placeholder="Kata Sandi" id="logpass" autocomplete="off">
                              <button type="button" class="toggle-password-button" onclick="togglePassword('logpass')">Lihat Kata Sandi</button>
                          </div>
                          @error('logpass')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn my-4">Masuk</button>
                        <div class="mt-5">
                          <small>
                            <a href="{{ route('lupa.password') }}" class="mt-3 button"
                              style="color: rgb(255, 255, 255) !important;">Lupa Kata Sandi?</a> <br>
                            <a role="button" onclick="changeForm()" class="mt-3 button"
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
                          <option class="form-style" value="siswa">Siswa</option>
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
                          <div class="password-input-container">
                            <input type="password" name="regpass" class="form-style @error('regpass') is-invalid @enderror" placeholder="Kata Sandi" id="regpass" value="{{ old('regpass') }}" autocomplete="off">
                            <button type="button" class="toggle-password-button" onclick="togglePassword('regpass')">Lihat Kata Sandi</button>
                          </div>
                          <i class="input-icon uil uil-lock-alt"></i>
                          <small class="error text-danger" id="passerr">
                            @error('regpass')
                              {{ $message }}
                            @enderror
                          </small>
                        </div>
                        <div class="form-group mt-2">
                          <label for="confirmpass" class="sr-only">Konfirmasi Sandi</label>
                          <div class="password-input-container">
                            <input type="password" name="confirmpass" class="form-style @error('confirmpass') is-invalid @enderror" placeholder="Konfirmasi Sandi" id="confirmpass" value="{{ old('confirmpass') }}" autocomplete="off">
                            <button type="button" class="toggle-password-button" onclick="togglePassword('confirmpass')">Lihat Kata Sandi</button>
                          </div>
                          <i class="input-icon uil uil-lock-alt"></i>
                          <small class="error text-danger" id="confirerr">
                            @error('confirmpass')
                              {{ $message }}
                            @enderror
                          </small>
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
    var toggleButton = document.querySelector(`#${fieldId} + .toggle-password-button`);
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