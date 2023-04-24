@extends('layout.master')
@section('title', 'Masuk Dulu Yaa!')

<link rel="stylesheet" href="{{ url('assets/css/login.css') }}">

@section('body-style')
  background: linear-gradient(to top, rgba(255, 255, 255, 0.3) 100%, rgba(255, 255, 255, 0.3) 100%), url(assets/img/bg.jpg);
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
    <a href="{{ route('beranda') }}">
      <img id="ikon-rumah" src="{{ url('assets/img/ikon-rumah.png') }}" alt="Ikon Rumah">
    </a>
    
    <div class="container mt-3">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">

            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif

            <input type="checkbox" id="reg-log" class="checkbox"
            @if($errors->has('logusername2') || $errors->has('logemail') || $errors->has('logpass2') || $errors->has('logpass2'))
                checked
            @endif>

            <label for="reg-log"></label>

            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">

                <!-- Start Masuk -->
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h4 class="m-2 pb-3 animated">Masuk</h4>
                        <label for="user-type" class="mt-2">Aku Adalah:</label>
                        <select class="form-style" id="user-type" name="user-type" onchange="toggleForm()">
                          <option class="form-style" value="murid">Murid</option>
                          <option class="form-style" value="orangtua">Orang Tua</option>
                        </select>
                        <label for="user-type" class="mt-2">Masukkan:</label>
                        <div class="form-group mt-2">
                          <input type="username" name="logusername" class="form-style" placeholder="Nama" id="logpass"
                            autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logusername')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="logpass" class="form-style" placeholder="Kata Sandi" id="logpass"
                            autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logpass')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn mt-4">Masuk</button>
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
                        <label for="user-type" class="mt-2">Aku Adalah:</label>
                        <select class="form-style" id="user-type-back" name="user-type-back" onchange="toggleFormBack()">
                          <option class="form-style" value="murid2">Murid</option>
                          <option class="form-style" value="orangtua2">Orang Tua</option>
                        </select>
                        <label for="user-type" class="mt-2">Masukkan:</label>
                        <div class="form-group mt-2">
                          <input type="username" name="logusername2" class="form-style" placeholder="Nama" id="logpass" value="{{ old('logusername2')}}"
                            autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logusername2')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" name="logemail" style="display: none;" class="form-style"
                            placeholder="Alamat Email" id="logemail2" value="{{ old('logemail')}}" autocomplete="off">
                          <i class="input-icon uil uil-at"></i>
                          @error('logemail')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="logpass2" class="form-style" placeholder="Kata Sandi" id="logpass" value="{{ old('logpass2')}}"
                            autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('logpass2')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="confirmpass" class="form-style" placeholder="Konfirmasi Sandi"
                            id="logpass" value="{{ old('confirmpass')}}" autocomplete="off">
                          <i class="input-icon uil uil-lock-alt"></i>
                          @error('confirmpass')
                            <small class="error text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        {{-- <div class="form-group mt-2">
                        <input type="username" name="logukids" style="display: none;" class="form-style"
                          placeholder="Nama Anak" id="logukids2" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div> --}}
                        {{-- button --}}
                        <button type="submit" class="btn mt-4">Kirim</button>
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
    function toggleForm() {
      var x = document.getElementById("user-type").value;
      if (x === "murid") {
        document.getElementById("logemail").style.display = "none";
        document.getElementById("logukids").style.display = "none";
      } else if (x === "orangtua") {
        document.getElementById("logemail").style.display = "block";
        document.getElementById("logukids").style.display = "block";
      } else {
        document.getElementById("logemail").style.display = "block";
        document.getElementById("logukids").style.display = "none";
      }
    }

    function toggleFormBack() {
      var y = document.getElementById("user-type-back").value;
      if (y === "murid2") {
        document.getElementById("logemail2").style.display = "none";
        document.getElementById("logukids2").style.display = "none";
      } else if (y === "orangtua2") {
        document.getElementById("logemail2").style.display = "block";
        document.getElementById("logukids2").style.display = "block";
      } else {
        document.getElementById("logemail2").style.display = "block";
        document.getElementById("logukids2").style.display = "none";
      }
    }
  </script>
  <!-- SCRIPT -->

@endsection